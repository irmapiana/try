<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="tback-form">
	
	<?php $form = ActiveForm::begin(); ?>

	<?= $form->fields($model, 'back_trxid')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'bankcode')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'merchantid')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'terminalid')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'batchnumber')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'settflag')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'settdate')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'isomsg')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'rc')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data1')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data2')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data3')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data4')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data5')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data6')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data7')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data8')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data9')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data10')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data11')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data12')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data13')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data14')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data15')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data16')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data17')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data18')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data19')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data20')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data21')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data22')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data23')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data24')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data25')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data26')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data27')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data28')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data29')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'data30')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'cby')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'cdate')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'mby')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'mdate')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'pid')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'orgid')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'schemaid')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'itemid')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'productid')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'footprint')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'note')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'front_trxid')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'print')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'tdate')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'sch_update')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'commision')->textInput(['maxlength' => true]) ?>

	<?= $form->fields($model, 'point')->textInput(['maxlength' => true]) ?>

	<div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		<?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger']) ?>
	</div>

	<?php ActiveForm::end() ?>

</div>