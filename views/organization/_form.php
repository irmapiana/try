<?php

use yii\helpers\Html;
use yii\widgets\activeForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Morg;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Morg */
/* @var $form yii\widgets\activeForm */
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#morg-form", function () {
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
        $("#morg-form").submit();
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

<div class="morg-form">

    <?php $form = activeForm::begin(['id' => 'morg-form']); ?>

    <?= $form->field($model, 'ORGID')->textInput(['maxlength' => true, 'placeholder'=>"Kode Organisasi"]) ?>

    <?= $form->field($model, 'ORGNAME')->textInput(['maxlength' => true, 'placeholder'=>"Nama Organisasi"]) ?>

    <!-- <?= $form->field($model, 'PARENT_ORGID')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'ISDEALER')->dropdownList([        
        0 => 'No',
        1 => 'Yes',
    ]) ?>

    <?php echo
        $form->field($model, 'PARENT_ORGID')->widget(Select2::classname(), [
            'data' => $dataParent,
            'language' => 'en',
        ]);
    ?>
    
    <?= $form->field($model, 'CHECKLIMIT')->dropdownList([
        'N' => 'No',
        'Y' => 'Yes',
    ]) ?>

    <!-- <?= $form->field($model, 'ISDEALER')->textInput(['maxlength' => true]) ?> -->

    

    <!--<?= $form->field($model, 'ADDRESS')->textInput(['maxlength' => true, 'placeholder'=>"Alamat"]) ?>-->

    <!--<?= $form->field($model, 'PIC')->textInput(['maxlength' => true, 'placeholder'=>"PIC"]) ?>-->

    <!--<?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true, 'placeholder'=>"Email"]) ?>-->

    <!--<?= $form->field($model, 'TLP')->textInput(['maxlength' => true, 'placeholder'=>"Nomor Telepon"]) ?>-->

    <!--<?= $form->field($model, 'BALANCE')->textInput(['placeholder'=>"Saldo Awal"]) ?>-->
    
    <!-- <?= $form->field($model, 'CHECKLIMIT')->textInput(['maxlength' => true]) ?> -->


    <!-- <?= $form->field($model, 'ISOBIT')->textInput() ?> -->

    <!-- // <?= $form->field($model, 'ISOVALUE')->textInput(['maxlength' => true]) ?> -->


    <!-- <?= $form->field($model, 'cby')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'cdate')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'mby')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'mdate')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'ITEXT')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'PRINT')->textInput(['maxlength' => true]) ?> -->



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger btn-back']) ?>
    </div>

    <?php activeForm::end(); ?>

</div>
