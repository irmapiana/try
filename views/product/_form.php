<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Mproduct;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#mproduct-form", function () {
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
        $("#mproduct-form").submit();
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

<div class="mproduct-form">

    <?php $form = ActiveForm::begin(['id' => 'mproduct-form']); ?>

    <?= $form->field($model, 'productid')->textInput(['maxlength' => true, 'disabled' => isset($used) ? $used : false, 'placeholder'=>"Kode Produk"]) ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true, 'placeholder'=>"Nama Produk"]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true, 'placeholder'=>"Catatan"]) ?>

    <!-- <?= $form->field($model, 'cby')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'cdate')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'mby')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'mdate')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'active')->dropdownList([
        'Y' => 'Ya',
        'N' => 'Tidak'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>        
        <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
