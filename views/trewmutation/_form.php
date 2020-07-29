<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use app\models\Museraccount;

/* @var $this yii\web\View */
/* @var $model app\models\Trewmutation */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
if (!$model->isNewRecord) {
    $js = '
    $("body").on("beforeSubmit", "form#trewmutation-form", function () {
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
        $("#trewmutation-form").submit();
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

<div class="trewmutation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reward_mutationid')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'userid')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Museraccount::find()->all(), 'userid'),
        'language' => 'id',
        'disabled' => !$model->isNewRecord,
        'options' => ['placeholder' => 'Pilih Akun..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>    
    <?= $form->field($model, 'mtype')-textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'point')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
