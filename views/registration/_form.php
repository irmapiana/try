<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Mregistration;
use yii\bootstrap\Modal;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#mregistration-form", function () {
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
        $("#mregistration-form").submit();
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

<div class="mregistration-form">
    <?php $form = ActiveForm::begin(['id' => 'mregistration-form',
    'action' => ['create'],
    'method' => 'post'
]); ?>

    <?= trim($form->field($model, 'account_no')->textInput(['maxlength' => true, 'placeholder'=>"No. REK"])) ?>

    <?= $form->field($model, 'account_name')->textInput(['maxlength' => true, 'placeholder'=>"Nama Akun"]) ?>

    <?= $form->field($model, 'enc_card_number')->label("No Kartu")?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true, 'placeholder'=>"Alamat"]) ?>

    <?= $form->field($model, 'propinsi')->textInput(['maxlength' => true, 'placeholder'=>"Provinsi"]) ?>

    <?= $form->field($model, 'kota')->textInput(['maxlength' => true, 'placeholder'=>"kota"]) ?>

    <?= $form->field($model, 'terminal_id')->textInput(['maxlength' => true, 'placeholder' => "Terminal ID"]) ?>

    <!--<?= $form->field($model, 'flag')->textInput(['maxlength' => true, 'placeholder' => "FLAG"]) ?> -->

    <!-- <?= $form->field($model, 'cby')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'cdate')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'mby')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'mdate')->textInput(['maxlength' => true]) ?> -->


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>        
        <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
