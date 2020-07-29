<?php

use yii\helpers\Html;
use yii\widgets\activeForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;
use yii\db\Expression;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Mregcommission */
/* @var $form yii\widgets\activeForm */
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#mregcommission-form", function () {
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
        $("#mregcommission-form").submit();
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

<div class="mregcommission-form">

    <?php $form = activeForm::begin(['id' => 'mregcommission-form']); ?>

    <?= $form->field($model, 'RCOMMISSIONID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RCLEVEL_CODE')->dropdownList([
        '' => '--Select--',
        'DMD' => 'DMD',
        'DDMD' => 'DDMD',
        'DDDMD' => 'DDDMD',
    ]) ?>

    <?= $form->field($model, 'REGCOST')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CASHBACK_0')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RCOMMISSION_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RCOMMISSION_2')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'RCOMMISSION_VALIDFROM')->widget(DatePicker::classname(), [
              'options' => ['placeholder' => ''],
              'value' => 'yyyy-mm-dd',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              
              'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => true,
                ]
        ]);
    ?>

    <?= $form->field($model, 'RCOMMISSION_VALIDUNTIL')->widget(DatePicker::classname(), [
              'options' => ['placeholder' => ''],
              'value' => 'yyyy-mm-dd',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              
              'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => true,
                ]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php activeForm::end(); ?>

</div>
