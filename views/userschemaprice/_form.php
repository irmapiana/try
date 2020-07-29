<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveField;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;

?>

<?php

if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#muserschemaprice-form", function () {
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
        $("#muserschemaprice-form").submit();
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

<div class="muserschemaprice-form">
    <?php $form = ActiveForm::begin(['id' => 'muserschemaprice-form']); ?>

    <?= $form->field($model, 'spriceid')->textInput(['maxlength' => true, 'placeholder' => 'Skema Price']) ?>

    <?= $form->field($model, 'userid')->textInput(['maxlength' => true, 'placeholder' => 'User ID']) ?>

    <!-- <?= $form->field($model, 'cby')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'cdate')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'mby')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'mdate')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger btn-back']) ?>  
    </div>

    <?php ActiveForm::end()?>
    
</div>