<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Mservice;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\MregrpointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service';
$this->params['breadcrumbs'][] = $this->title;
?>
<p style="font-size: 30px; margin-top: -40px;">SERVICE</p>

<div class="mservice-index">

    <section class="btn btn-create", style="margin-top: 40px;">
        <?= Html::a('Tambah Service', ['create'],['class' => 'btn btn-success']) ?>
    </section>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'service_name',
            'build_number',
            'url_mode',
            'active',
            'url',

            // 'RRPOINTID'
            // 'cby',
            // 'cdate',
            // 'mby',
            // 'mdate',

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'ACTION',
            'template' => '{update} &nbsp; &nbsp; {delete}',
            'buttons' => [
                    'delete' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                    'title' => Yii::t('app', 'Delete'),
                                    'data' => [
                                        'confirm' => Yii::$app->params['deleteConfirm'],
                                        'method' => 'post',
                                    ]
                                ]);
                            }

                ]
            ]
        ],
    ]); ?>
</div>