<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Mservice;
use yii\db\Expression;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\Models\Mregrpoint */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#mservice-form", function () {
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
        $("#mservice-form").submit();
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

<div class="mservice-form">

    <?php $form = ActiveForm::begin(['id' => 'mservice-form']); ?>

    <?= $form->field($model, 'service_name')->textInput(['maxlength' => true, 'placeholder' => "Nama Service"]) ?>

    <?= $form->field($model, 'build_number')->textInput(['maxlength' => true, 'placeholder' => "Build Number"]) ?>

    <?= $form->field($model, 'url_mode')->textInput(['maxlength' => true, 'placeholder' => "URL Mode"]) ?>

    <?= $form->field($model, 'active')->dropdownList([
        'Y' => 'Ya',
        'N' => 'Tidak'
    ]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true, 'placeholder' => "URL"]) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
