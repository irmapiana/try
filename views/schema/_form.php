<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\activeField;
use kartik\select2\Select2;
use kartik\checkbox\CheckboxX;
use yii\helpers\ArrayHelper;

use app\models\Dproductitem;
use app\models\Mproduct;
use app\models\Morg;
use app\models\Bank;
use app\models\Maccount;
use app\models\MpriceSchema;
use app\models\Msellprice;
use yii\bootstrap\Modal;



/* @var $this yii\web\View */
/* @var $model app\Models\Mschema */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$script = <<< JS
$(document).ready(function(){
    $("#loading2").hide();
    $(document).ready(function() {
        $("#mschema-productid").on('change', function() {
            var product = $(this).val();
            if(product) {
                $.ajax({
                    url: 'lists?id='+product,
                    type: "GET",
                    beforeSend: function(){
                        $("#loading2").show();
                    },
                    success:function(data) {
                        $("#loading2").hide();
                        $("#mschema-itemid").html(data);
                    }
                });
            }else{
                $("#mschema-itemid").empty();
            }
        });
    });
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#mschema-form", function () {
        var form = $(this);     
        if (form.find(".has-error").length) {
            return false;
        }
        else {
            if($("#confirm-submit").hasClass("in")) {
                return true;
            }
            else {
                $("#confirm-submit").modal("show");
            }
        }    
        return false;
    });
    $("#submit").click(function(){
        $("#mschema-form").submit();
    });
    ';
    $this->registerJs($js);
    $button = Html::button('Ubah', ['id' => 'submit', 'class' => 'btn btn-primary success btn-md']);
    $button .= Html::button('Batal', ['class' => 'btn btn-danger btn-md', 'data' => ['dismiss' => "modal"]]);
    
    Modal::begin([
        'header' => '<h4>Konfirmasi</h4>',
        'toggleButton' => false,
        'id' => 'confirm-submit',
        'footer' => $button
    ]);
        echo 'Apakah Yakin Ingin Mengubah?';
    Modal::end();
}
?>

<div class="mschema-form">
    <?php $form = ActiveForm::begin(['id' => 'mschema-form']); ?>

    <?= $form->field($model, 'schemaid')->textInput(['maxlength' => true,'placeholder' => 'Kode Skema']) ?>

    <?php 
        $dataactive=[
            'Y' => 'Yes',
            'N' => 'No'
        ];
        echo $form->field($model, 'active')->widget(Select2::classname(), [
            'data' => $dataactive,
            'language' => 'id',
            'options' => [
                // 'id' => 'active',
                // 'name' => 'active',
                'placeholder' => 'Aktif/Tidak Akftif',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?php $form->field($model, 'productid')->textInput(['maxlength' => true]) ?>

    <?php
        echo $form->field($model, 'productid')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Mproduct::find()->all(), 'productid', 'product_name'),
            'language' => 'id',
            'options' => [
                //mschema-productid'id' => 'mschema-productid',
                //'name' => 'mschema-productid',
                'placeholder' => 'Pilih Produk...',
                // 'onchange'=>
                //     '$.post( "'.Yii::$app->urlManager->createUrl('schema/listsdecodeURIComponent(uri_enc)id=').'"+$(this).val(), function( data ) {
                //     $("select#produkitem").select2("val","");
                //     $( "select#produkitem" ).html( data );
                // });'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);

        $dataProducitem=ArrayHelper::map(Dproductitem::find()->all(), 'itemid', 'itemname');
        echo $form->field($model, 'itemid')->widget(Select2::classname(), [
            'data' => $dataProducitem,
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Item..',/*'id'=>'produkitem','name'=>'produkitem'*/],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);

    ?>

    <?php 
    $dataOrgid=[''];
        echo $form->field($model, 'orgid')->widget(Select2::classname(), [
            'data' => $dataOrganisasi,
            'language' => 'id',
            'options' => [
                // 'id' => 'organisasi',
                // 'name' => 'organisasi',
                'placeholder' => 'Pilih Organisasi...',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?php 
        $dataItype=[
            'B' => 'BILLER',
            'C' => 'Collecting Agent'
        ];
        echo $form->field($model, 'itype')->widget(Select2::classname(), [
            'data' => $dataItype,
            'language' => 'id',
            'options' => [
                // 'id' => 'itype',
                // 'name' => 'itype',
                'placeholder' => 'Tipe Organisasi',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?php 
        $dataBankcode=[''];
        echo $form->field($model, 'bankcode')->widget(Select2::classname(), [
            'data' => $dataBankcode,
            'language' => 'id',
            'options' => [
                // 'id' => 'bank',
                // 'name' => 'bank',
                'placeholder' => 'Pilih Bank...',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?php 
        $dataAccount=[''];
        echo $form->field($model, 'userid')->widget(Select2::classname(), [
            'data' => $dataAccount,
            'language' => 'id',
            'options' => [
                // 'id' => 'akun',
                // 'name' => 'akun',
                'placeholder' => 'Pilih Akun...',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?php 
        $dataTrmsukAdmin=[
            '0' => 'N',
            '1' => 'Y'
        ];
        echo $form->field($model, 'admininclude')->widget(Select2::classname(), [
            'data' => $dataTrmsukAdmin,
            'language' => 'id',
            'options' => [
                // 'id' => 'admininclude',
                // 'name' => 'admininclude',
                'placeholder' => 'Termasuk Admin',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?php 
        $dataFixAdmin=[
            '0' => 'N',
            '1' => 'Y'
        ];
        echo $form->field($model, 'fix_ca_adminfee')->widget(Select2::classname(), [
            'data' => $dataFixAdmin,
            'language' => 'id',
            'options' => [
                // 'id' => 'fixadmin',
                // 'name' => 'fixadmin',
                'placeholder' => 'Fix Admin',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'ca_adminfee')->textInput(['placeholder' => 'Admin FEE']) ?>

    <?php 
        /*$dataspriceid=[
            0 => 'AGENT_PRICE',
            1 => 'DEALER_PRICE'
        ];*/
        echo $form->field($model, 'spriceid')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Msellprice::find()->all(), 'spriceid', 'spriceid'),
            'language' => 'id',
            'options' => [
                // 'id' => 'spriceid',
                // 'name' => 'spriceid',
                'placeholder' => 'Kode Harga',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'ppriceid')->textInput(['maxlength' => true,'placeholder' => 'Kode Harga']) ?>

    <?php 
        $dataCal=[];
        echo $form->field($model, 'calendarid')->widget(Select2::classname(), [
            'data' => $dataCal,
            'language' => 'id',
            'options' => [
                // 'id' => 'kalender',
                // 'name' => 'kalender',
                'placeholder' => 'Kalender...',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'classname')->textInput(['maxlength' => true,'placeholder' => 'Nama Persistant']) ?>

    <?= $form->field($model, 'converter')->textInput(['maxlength' => true,'placeholder' => 'Nama Konverter']) ?>

    <?= $form->field($model, 'destinationid')->textInput(['maxlength' => true,'placeholder' => 'Tujuan Transaksi']) ?>



   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger btn-back']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
<div id="loading2" style="float:left;
    top:200px;
    left:800px;
    position:fixed;
    padding:10px 1.5%;
    height: 0px;">
    <img src="<?php echo Yii::getAlias('@web')?>/img/loading.gif" width="150" height="150" />
</div>
