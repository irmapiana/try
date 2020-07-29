<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Mresource;
use yii\bootstrap\Modal;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\broadcast */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#mresource-form", function () {
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
        $("#mresource-form").submit();
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

<div class="mresource-form">

    <?php $form = ActiveForm::begin(['id' => 'mresource-form']); ?>

    <!--?= $form->field($model, 'TOPICID')->textInput(['maxlength' => true]) ?-->
    <?= $form->field($model, 'resourceid')->textInput(['maxlength' => true, 'placeholder' => 'Resource ID']) ?>
    <?= $form->field($model, 'resource_type')->textInput(['maxlength' => true, 'placeholder' => 'Resource Type']) ?>
    <?= $form->field($model, 'resource_url')->textInput(['maxlength' => true, 'placeholder' => 'Resource URL']) ?>
    <?= $form->field($model, 'layout_id')->textInput(['maxlength' => true, 'placeholder' => 'Layout id']) ?>
    <!-- <?= $form->field($model, 'cby')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'cdate')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'mby')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'mdate')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <!--?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?-->
        <?= Html::a(Yii::t('app', 'Batal'), ['index'], ['class' => 'btn btn-warning']) ?>
       <!-- ?= Html::a(Yii::t('app', 'sendNotif'), ['send'], ['class'=> 'btn btn-success' : 'btn btn-primary']) ?-->

    </div>

    <?php ActiveForm::end(); ?>

</div>
