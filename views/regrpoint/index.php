<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\MregrpointSearch */
/* @var $dataProvider yii\data\activeDataProvider */

$this->title = 'POIN REGISTRASI';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mregrpoint-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="mregrpoint-index", style="margin-right: 1100px; background-color: #fff; background-size: -50px;" onclick="showSettingDropdown()">
                <p style="font-size: 20px; font-style: bold;">
         <?= Html::a('Tambah poin Registrasi', ['create'], ['class="mregrpoint-index"'],['class' => 'btn btn-success btn-create']) ?>
         </p>
         </section>
    <?php
        $level = ['DMD' => 'DMD', 'DDMD' => 'DDMD', 'DDDMD' => 'DDDMD'];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'RRPOINTID',
            [
                'attribute' => 'RRPLEVEL_CODE',
                'value' => 'RRPLEVEL_CODE',
                'filter' => Html::activeDropDownList($searchModel, 'RRPLEVEL_CODE', $level, ['class' => 'form-control', 'prompt' => 'Semua Level']),
            ],
            [
                'attribute' => 'RRPOINT_0',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<div align="right">' . number_format($data->RRPOINT_0, 0, ',', '.') . '</div>';
                },
            ],
            [
                'attribute' => 'RRPOINT_1',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<div align="right">' . number_format($data->RRPOINT_1, 0, ',', '.') . '</div>';
                },
            ],
            [
                'attribute' => 'RRPOINT_2',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<div align="right">' . number_format($data->RRPOINT_2, 0, ',', '.') . '</div>';
                },
            ],
            [
                'attribute' => 'RRPOINT_VALIDFROM',
                'format' => ['date', 'php:d-m-Y']
            ],
            [
                'attribute' => 'RRPOINT_VALIDUNTIL',
                'format' => ['date', 'php:d-m-Y']
            ],
            // 'cby',
            // 'cdate',
            // 'mby',
            // 'mdate',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}&nbsp&nbsp&nbsp&nbsp{delete}',
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
                ]
            ]
        ],
    ]); ?>
</div>
