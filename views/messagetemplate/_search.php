<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="mmessagetemplate-search">
	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
		]); ?>

		<?= $form->field($model, 'code') ?>
		<?= $form->field($model, 'template') ?>
		<?= $form->field($model, 'params') ?>
		<?= $form->field($model, 'cby')?>
		<?= $form->field($model, 'cdate')?>
		<?= $form->field($model, 'mby')?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

		<?php ActiveForm::end(); ?>
</div>