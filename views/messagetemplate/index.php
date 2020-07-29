<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Mmessagetemplate;
use yii\helpers\ArrayHelper;

$this->title = 'Message Template';
$this->params ['breadcrumbs'][] = $this->title;
?>

<p style="font-size: 30px; margin-top: -20px;">Message Template</p>

<div class="mmessagetemplate-index", style="margin-top: 40px;">
	<section class="btn btn-create", style="margin-top: 90px">
		<?= Html::a('Tambah Message Template', ['create'], ['class' => 'btn btn-success']) ?>
	 </section>

	<?=
	GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
		'columns'=> [
			['class' => 'yii\grid\SerialColumn'],
			'code',
			'template',
			'params',
			['class' => 'yii\grid\ActionColumn',
			'header' => 'Actions',
			'template' => '{update} &nbsp; &nbsp; {delete} &nbsp; &nbsp;',
			'buttons' => [
				'delete' => function($url,$model){
					return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
						'title' => Yii::t('app', 'Delete'),
						'data' => [
							'confirm' => Yii::$app->params['deleteConfirm'],
							'method' => 'post',
						]
					]);
				},
			],
			'buttons' => [
				'send' => function($url, $controller){
					return Html::a('<span class="glyphicon glyphicon-send"></span>', $url, [
						'data' => [
							'method' => 'post',
						]
					]);
				},
			]
		]
	],
]); ?>
</div>