<?php

use yii\helpers\Html;
use yii\widgets\Detailview;

$this->title = $model->back_trxid;
$this->params['breadcrumbs'][] = ['label' => 'Tbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tback-view">
	
	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'id' => $model->back_trxid], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Delete', ['delete', 'id' => $model->back_trxid], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post',
				],
			]) ?>
	</p>

	<?= Detailview::widget([
		'model' => $model,
		'attributes' => [
			'back_trxid',
			'bankcode',
			'merchantid',
			'terminalid',
			'bastchnumber',
			'settflag',
			'settdate',
			'isomsg',
			'rc',
			'data1',
			'data2',
			'data3',
			'data4',
			'data5',
			'data6',
			'data7',
			'data8',
			'data9',
			'data10',
			'data11',
			'data12',
			'data13',
			'data14',
			'data15',
			'data16',
			'data17',
			'data18',
			'data19',
			'data20',
			'data21',
			'data22',
			'data23',
			'data24',
			'data25',
			'data26',
			'data27',
			'data28',
			'data29',
			'data30',
			'cby',
			'cdate',
			'mby',
			'mdate',
			'pid',
			'orgid',
			'schemaid',
			'itemid',
			'productid',
			'footprint',
			'note',
			'front_trxid',
			'print',
			'tdate',
			'sch_update',
			'commission',
			'point',		
		],
	])?>
</div>