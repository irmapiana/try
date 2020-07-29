<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="tback-search">
	
	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
		]); ?>

		<?= $form->fields($model, 'back_trxid') ?>

		<?= $form->fields($model, 'bankcode') ?>

		<?= $form->fields($model, 'merchantid') ?>

		<?= $form->fields($model, 'terminalid') ?>

		<?= $form->fields($model, 'batchnumber') ?>

		<div class="form-group">
			
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::submitButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

		<?php ActiveForm::end(); ?>
</div>