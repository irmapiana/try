<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Mmconfig;
use yii\bootstrap\Modal;

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
    $button = Html::button('Ubah', ['identifier' => 'submit', 'class' => 'btn btn-primary success btn-md']);
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

<div class="mmconfig-form">
    <?php $form = ActiveForm::begin(['id' => 'mmconfig-form']); ?>
    <?= $form->field($model, 'identifier')->textInput(['maxlength' => true, 'placeholder'=>"Identifier"]) ?>
    <?= $form->field($model, 'url_mode')->textInput(['maxlength' => true, 'placeholder'=>"url_mode"]) ?>
    <?= $form->field($model, 'active')->dropdownList([
        'Y' => 'Ya',
        'N' => 'Tidak'
        ]) ?>
    <?= $form->field($model, 'value')->textInput(['maxlength' => true, 'placeholder' => "Value"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isnewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end();?>

</div>