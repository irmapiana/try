<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveField;
use kartik\checkbox\CheckboxX;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\Models\Mschemaprice */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if (!$model->isNewRecord) {
    $js = '
    $("body").on("beforeSubmit", "form#mschemaprice-form", function () {
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
        $("#mschemaprice-form").submit();
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

<div class="mschemaprice-form">
	<?php $form = ActiveForm::begin(['id' => 'mschemaprice-form']);?>

	<?= $form->field($model, 'spriceid')->textInput(['maxLength' => true, 'placeholder' => 'Skema Harga'])?>
	<?= $form->field($model, 'active')->dropdownList([
		'Y' => 'Yes',
		'N' => 'No',
	])?>
		<?= $form->field($model, 'sch_updated')->textInput(['maxLength'=>true])?>
		<?= $form->field($model, 'schedule_rules')->textInput(['maxLength'=>true])?>
		<?= $form->field($model, 'priority')->textInput(['maxLength'=>true])?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord? 'Tambah' : 'Ubah', ['class'=> $model->isNewRecord? 'btn btn-success' : 'btn btn-primary'])?>
			<?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger btn-back'])?>
		</div>
		<?php ActiveForm::end();?>
</div>