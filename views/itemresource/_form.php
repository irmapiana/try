<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Mitemresource;
use app\models\Dproductitem;
use yii\bootstrap\Modal;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#mitemresource-form", function () {
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
        $("#itemresource-form").submit();
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

<div class="mitemresource-form">

    <?php $form = ActiveForm::begin(['id' => 'itemresource-form']); ?>

    <?=
    $form->field($model, 'itemid')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Dproductitem::find()->where(['active'=>'Y'])->orderBy(['itemname' => SORT_ASC])->all(), 'itemid', 'itemid'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Produk item..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        'disabled' => isset($used) ? $used : false,
    ]);
    ?>

    <?= $form->field($model, 'resourceid')->textInput(['maxlength' => true, 'placeholder'=>"Resource ID"]) ?>

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
