<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => 'mmessagetemplates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmessagetemplate-view">
	<h1><?=Html::encode($this->title)?></h1>

	<p>
		<?=Html::a('Update', ['update', 'id' => $model->code], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Delete', ['delete', 'id' => $model->code], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post',
			],
			])?>
	</p>

	<?= DetailView::widgets([
		'model' => $model,
		'attributes' => [
			'code',
			'template',
			'params',
			'cby',
			'cdate',
			'mby',
			'mdate',
		],
	])?>
</div>