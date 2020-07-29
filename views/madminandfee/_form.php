<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Msellprice;
use app\models\Mproduct;
use app\models\Dproductitem;
use app\models\Madminandfee;
use yii\db\Expression;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Mspriceadmin */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#madminandfee-form", function () {
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
        $("#madminandfee-form").submit();
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
<div class="madminandfee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $form = ActiveForm::begin(['id' => 'madminandfee-form']); ?>

    <?= $form->field($model, 'id')->textInput(['maxlength' => true, 'disabled' => isset($used) ? $used : false, 'placeholder'=>"Kode Admin"]) ?>

    <?php
        $dataPoduct =ArrayHelper::map(Madminandfee::find()->all(), 'spriceid', 'spriceid');
        echo $form->field($model, 'spriceid')->widget(Select2::classname(), [
            'data' => $dataPoduct,
        'language' => 'id',
        'options' => [
            'placeholder' => 'Pilih Skema Harga..', 'id' => 'title'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
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
        ?>
        <?=
    $form->field($model, 'itemid')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Dproductitem::find()->where(['active'=>'Y'])->orderBy(['itemname' => SORT_ASC])->all(), 'itemid', 'itemid'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Produk Item..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        'disabled' => isset($used) ? $used : false,
    ]);
    ?>


    <?= $form->field($model, 'ks_fee')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'admin')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'fix_admin')->dropdownList([1 => 'Ya', 0 => 'Tidak']) ?>
    <?= $form->field($model, 'merchant_fee')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'fix_merchant_fee')->dropdownList([1 => 'Ya', 0 => 'Tidak']) ?>

    <?= $form->field($model, 'valid_from')->widget(DatePicker::classname(),[
              'options' => ['placeholder' => ''],
              'value' => 'yyyy-mm-dd',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              
              'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => TRUE,
            ]
        ]);
    ?>
    <?= $form->field($model, 'valid_until')->widget(DatePicker::classname(),[
              'options' => ['placeholder' => ''],
              'value' => 'yyyy-mm-dd',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              
              'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd',
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
