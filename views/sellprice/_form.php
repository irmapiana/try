<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Msellprice */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#msellprice-form", function () {
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
        $("#msellprice-form").submit();
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

<div class="msellprice-form">

    <?php $form = ActiveForm::begin(['id' => 'msellprice-form']); ?>
    <?php
        /*if (isset($from) && $from['new']) { ?>
            <div class="form-group">
            <label><?php echo "GRUP HARGA" ?></label>
            <input type="text" name="ppitemid" value="<?php echo $from['ppitemid'] ?>" class="form-control" disabled>
            <div class="help-block"></div>
            </div>
        <?php
            echo Html::hiddenInput('ppitemid', $from['ppitemid']);
        } else {

            echo $form->field($model, 'ppitemid')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Msellprice::find()->all(), 'ppitemid', 'ppitem_price'),
                'language' => 'id',
                'options' => ['placeholder' => 'Pilih Harga..'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'disabled' => true
                ],
            ]);
        }*/
    ?>

    <?= $form->field($model, 'ppitemid')->textInput(['maxlength' => true, 'disabled' => isset($used) ? $used : false,'placeholder' => 'Kode Pembelian']) ?>

    <?= $form->field($model, 'spriceid')->textInput(['maxlength' => true,'placeholder' => 'Deskripsi']) ?>

    <?= $form->field($model, 'ppitem_validfrom')->widget(DatePicker::classname(),[
              'options' => ['placeholder' => ''],
              //'value' => 'yyyy-mm-dd',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              
              'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => TRUE,
            ]
        ]);
    ?>
    <?= $form->field($model, 'ppitem_validuntil')->widget(DatePicker::classname(),[
              'options' => ['placeholder' => ''],
              //'value' => 'yyyy-mm-dd',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              
              'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => TRUE,
            ]
        ]);
    ?>

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
