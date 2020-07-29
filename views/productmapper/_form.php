<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Mproductmapper;
use app\models\Mproduct;
use app\models\Dproductitem;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#mproductmapper-form", function () {
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
        $("#mproductmapper-form").submit();
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

<div class="mproductmapper-form">

    <?php $form = ActiveForm::begin(['id' => 'mproductmapper-form']); ?>

     <?=
    $form->field($model, 'productid1')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Mproduct::find()->where(['active'=>'Y'])->orderBy(['product_name' => SORT_ASC])->all(), 'productid', 'productid'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Produk..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        'disabled' => isset($used) ? $used : false,
    ]);
    ?>

    <?= $form->field($model, 'itemid1')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Dproductitem::find()->where(['active'=>'Y'])->orderBy(['itemname' => SORT_ASC])->all(), 'itemid', 'itemid'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Produk Item..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        'disabled' => isset($used) ? $used : false,
    ]);
    ?>

    <?= $form->field($model, 'productid2')->textInput(['maxlength' => true, 'placeholder'=>"Kode Produk 2"]) ?>

    <?= $form->field($model, 'itemid2')->textInput(['maxlength' => true, 'placeholder'=>"Nama Produk 2"]) ?>

    <?= $form->field($model, 'info')->textInput(['maxlength' => true, 'placeholder'=>"Info"]) ?>

    <?= $form->field($model, 'switch')->textInput(['maxlength' => true, 'placeholder'=>"Switch"]) ?>

    <?= $form->field($model, 'active')->dropdownList([
        'Y' => 'Ya',
        'N' => 'Tidak'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>        
        <?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
