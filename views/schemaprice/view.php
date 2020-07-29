<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Mschemaprice */

$this->title = $model->spriceid;
$this->params['breadcrumbs'][] = ['label' => 'Mschemaprices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Mschemaprice-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'spriceid' => $model->spriceid, 'sch_updated' => $model->sch_updated], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Delete', ['delete', 'spriceid'=> $model->spriceid, 'sch_updated' => $model->sch_updated], ['class' => 'btn btn-danger',
		'data' => [
			'confirm' => 'Are you sure you want to delete this item?',
			'method' => 'post',
			],
		]) ?>
	</p>

	<?= DetailView::widgets([
		'model' => $model,
		'attributes' => [
			'spriceid',
			'cby',
			'cdate',
			'mby',
			'mdate',
			'sch_updated',
			'schedule_rules',
			'priority',
			],
		]) ?>
</div>