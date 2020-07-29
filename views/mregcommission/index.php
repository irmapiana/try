<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MregcommissionSearch */
/* @var $dataProvider yii\data\activeDataProvider */

$this->title = 'Komisi Registrasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mregcommission-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="mregcommission-index", style="margin-right: 1100px; background-color: #fff; background-size: -50px;" onclick="showSettingDropdown()">
                <p style="font-size: 20px; font-style: bold;">
         <?= Html::a('Tambah Komisi Registrasi', ['create'], ['class="mregcommission-index"'],['class' => 'btn btn-success btn-create']) ?>
         </p>
         </section>
    <?php
        $level = ['DMD' => 'DMD', 'DDMD' => 'DDMD', 'DDDMD' => 'DDDMD'];
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'RCLEVEL_CODE',
                'value' => 'RCLEVEL_CODE',
                'filter' => Html::activeDropDownList($searchModel, 'RCLEVEL_CODE', $level, ['class' => 'form-control', 'prompt' => 'Semua Level']),
            ],
            [
                'attribute' => 'REGCOST',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<div align="right">' . number_format($data->REGCOST, 0, ',', '.') . '</div>';
                },
            ],
            [
                'attribute' => 'CASHBACK_0',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<div align="right">' . number_format($data->CASHBACK_0, 0, ',', '.') . '</div>';
                },
            ],
            [
                'attribute' => 'RCOMMISSION_1',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<div align="right">' . number_format($data->RCOMMISSION_1, 0, ',', '.') . '</div>';
                },
            ],
            [
                'attribute' => 'RCOMMISSION_2',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<div align="right">' . number_format($data->RCOMMISSION_2, 0, ',', '.') . '</div>';
                },
            ],
            [
                'attribute' => 'RCOMMISSION_VALIDFROM',
                'format' => ['date', 'php:d-m-Y']
            ],
            [
                'attribute' => 'RCOMMISSION_VALIDUNTIL',
                'format' => ['date', 'php:d-m-Y']
            ],

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
            ],
        ],
    ]); ?>
</div>
