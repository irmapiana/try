<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Broadcast;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\broadcastSearch */
/* @var $dataProvider yii\data\activeDataProvider */

$this->title = 'BroadCast';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="broadcast-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Tambah Message', ['create'], ['class' => 'btn btn-success btn-create']) ?>
    </p>
    <p>
        <!-- <?= Html::a('Create broadcast', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TOPICID',
            'TITLE',
            'POSTDATE',
            'POSTBY',
            'MESSAGE',
            'MESSAGEID',


            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}&nbsp&nbsp&nbsp&nbsp{delete}&nbsp&nbsp&nbsp&nbsp{send}',
            'buttons' => [
                    'delete' => function ($url, $model) {
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
                'send' => function ($url, $controller) {
                        return Html::a('<span class="glyphicon glyphicon-send"></span>', $url, [
                                    'title' => Yii::t('app', 'sendNotif'),
                                    'data' => [
                                        //'confirm' => Yii::$app->params['deleteConfirm'],
                                        'method' => 'post',
                                    ]
                        ]);
                    },
                ]
            ]
        ],
    ]); ?>
</div>
