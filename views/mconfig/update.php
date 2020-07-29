<?php

use yii\helpers\Html;

$this->title = 'Ubah Config : ' . $model->identifier;
$this->params['breadcrumbs'][] = ['label' => 'Mmconfigs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->identifier, 'url' => ['view', 'identifier' => $model->identifier]];

?>

<div class="mmconfig-update">
	<?= Html::encode($this->title) ?>

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>
</div>