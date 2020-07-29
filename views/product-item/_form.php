<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Mproduct;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Dproductitem */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#dproductitem-form", function () {
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
        $("#dproductitem-form").submit();
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

<div class="dproductitem-form">

    <?php $form = ActiveForm::begin(['id' => 'dproductitem-form']); ?>

    <?=
    $form->field($model, 'productid')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Mproduct::find()->where(['active'=>'Y'])->orderBy(['product_name' => SORT_ASC])->all(), 'productid', 'productid'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Produk..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        'disabled' => isset($used) ? $used : false,
    ]);
    ?>

    <?= $form->field($model, 'itemid')->textInput(['maxlength' => true, 'readonly' => isset($used) ? $used : false, 'placeholder'=>"Kode Item"]) ?>

    <?= $form->field($model, 'itemname')->textInput(['maxlength' => true, 'placeholder'=>"Nama Item"]) ?>

    <?= $form->field($model, 'note')->textarea(['maxlength' => true, 'placeholder'=>"Catatan"]) ?>

    <?= $form->field($model, 'transaction_type')->textarea(['maxlength' => true, 'placeholder'=>"Tipe Transaksi"]) ?>

    <?= $form->field($model, 'denom')->textarea(['maxlength' => true, 'placeholder'=>"Denom"]) ?>

    <?= $form->field($model, 'shortname')->textarea(['maxlength' => true, 'placeholder'=>"Short Name"]) ?>

    <?= $form->field($model, 'header_receipt')->textarea(['maxlength' => true, 'placeholder'=>"Header"]) ?>

    <?= $form->field($model, 'nominal_alias')->textarea(['maxlength' => true, 'placeholder'=>"Nominal"]) ?>

    <?= $form->field($model, 'footer_receipt')->textarea(['maxlength' => true, 'placeholder'=>"Footer"]) ?>

    <?= $form->field($model, 'denom_notation')->textarea(['maxlength' => true, 'placeholder'=>"Denom Notation"]) ?>

    <?= $form->field($model, 'logo')->textarea(['maxlength' => true, 'placeholder'=>"Logo"]) ?>

    <?= $form->field($model, 'active')->dropdownList(['Y' => 'Ya', 'N' => 'Tidak']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
