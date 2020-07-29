<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Transaksi Provider';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="tback-index">
	
	<div id="musrenbang" style="overflow: auto;overflow-y: auto;overflow-x: visible;">
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
			'columns' => [
				['class' => 'yii\grid\SerialColumn'],

				'back_trxid',
				'bankcode',
				'merchantid',
				'terminalid',
				'batchnumber',
				'settflag',
				[
					'attribute' => 'settdate',
					'format' => ['date', 'php:d-m-Y']
					],
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
					'commision',
					'point',

					['class' => 'yii\grid\ActionColumn',
					'template' => '{update}'],
				],
			]); ?>
	</div>

</div>