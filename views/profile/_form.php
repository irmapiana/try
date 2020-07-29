<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use kartik\switchinput\SwitchInput;
use yii\bootstrap\Modal;
use app\models\Mwebgroup;

/* @var $this yii\web\View */
/* @var $model app\Models\Muser */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#profile-form", function () {
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
        $("#profile-form").submit();
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
<div class="profile-form">

    <?php $form = ActiveForm::begin(['id' => 'profile-form']); ?>

    <?= $form->field($model, 'userid')->textInput(['maxlength' => true, 'disabled' => !$model->isNewRecord]) ?>

    <?php if (!$model->isNewRecord) { ?>
        <strong><i> Biarkan kosong jika tidak ingin mengubah password</i></strong>
    <?php } ?>

    <?= $form->field($model, 'new_password')->passwordInput(['maxlength' => true]) ?> 

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>

    <?= $form->field($model, 'group_user')->textInput(['maxlength' => true]) ?>

    <?=
        $form->field($model, 'webgroup_user')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Mwebgroup::find()->all(), 'group_user', 'gusername'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Web Group..'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'mobileno')->textInput(['maxlength' => true, 'placeholder' => 'Nomor HP']) ?>

    <?=
    $form->field($model, 'status_user')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'onText' => 'Active',
            'offText' => 'Banned',
        ]
    ])
    ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
