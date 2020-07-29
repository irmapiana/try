<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Msellprice;
use app\models\Mproduct;
use app\models\Dproductitem;
use yii\db\Expression;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Msalescommission */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#msalescommission-form", function () {
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
        $("#msalescommission-form").submit();
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

<div class="msalescommission-form">

    <?php $form = ActiveForm::begin(['id' => 'msalescommission-form']); ?>

    <?= $form->field($model, 'SCOMMISSIONID')->textInput(['maxlength' => true,
                'placeholder' => 'Kode Komisi']) ?>
   
    <?php
        if (isset($from) && $from['new']) { ?>
            <div class="form-group">
            <label><?php echo $from['spriceid'] ?></label>
            <input type="text" name="spriceid" value="<?php echo $from['spriceid'] ?>" class="form-control" disabled>
            <div class="help-block"></div>
            </div>
        <?php
            echo Html::hiddenInput('spriceid', $from['spriceid']);
        } else {

            echo $form->field($model, 'spriceid')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Msellprice::find()->all(), 'spriceid', 'SPRICE_NAME'),
                'language' => 'id',
                'options' => ['placeholder' => 'Pilih Harga..'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'disabled' => true
                ],
            ]);
        }
    ?>

    <?php
        $dataPoduct=ArrayHelper::map(Mproduct::find()->all(), 'productid', 'product_name');
        echo $form->field($model, 'productid')->widget(Select2::classname(), [
            'data' => $dataPoduct,
            'language' => 'id',
            'options' => [
                'placeholder' => 'Pilih PRODUK...',
                'onchange'=>'
                    $.post( "'.Yii::$app->urlManager->createUrl('sprice-item/lists?id=').'"+$(this).val(), function( data ) {
                        $("select#title").select2("val","");
                        $("select#title").html( data );
                    });'
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);

        $dataItem=ArrayHelper::map(Dproductitem::find()->all(), 'itemid', 'itemname');
        $data_Item = array();
        echo $form->field($model, 'itemid')->widget(Select2::classname(), [
            'data' => $dataItem,
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih ITEM..','id'=>'title'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);

    ?>
    
    <?= $form->field($model, 'SCOMMISSION_0')->textInput(['maxlength' => true,
                'placeholder' => 'Komisi L0']) ?>

    <?= $form->field($model, 'SCOMMISSION_1')->textInput(['maxlength' => true,
                'placeholder' => 'Komisi L1']) ?>

    <?= $form->field($model, 'SCOMMISSION_2')->textInput(['maxlength' => true,
                'placeholder' => 'komisi L2']) ?>

     <?= $form->field($model, 'SCOMMISSION_VALIDFROM')->widget(DatePicker::classname(),[
              'options' => ['placeholder' => ''],
              'value' => 'yyyy-mm-dd',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              
              'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => TRUE,
            ]
        ]);
    ?>
    <?= $form->field($model, 'SCOMMISSION_VALIDUNTIL')->widget(DatePicker::classname(),[
              'options' => ['placeholder' => ''],
              'value' => 'yyyy-mm-dd',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              
              'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => TRUE,
            ]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
