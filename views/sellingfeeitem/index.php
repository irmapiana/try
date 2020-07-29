<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsellpriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grup Harga';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msellingfeeitem-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="msellingfeeitem-index", style="margin-right: 1100px; background-color: #fff; background-size: -50px;" onclick="showSettingDropdown()">
                <p style="font-size: 20px; font-style: bold;">
         <?= Html::a('Tambah Grup Harga', ['create'], ['class="msellingfeeitem-index"'],['class' => 'btn btn-success btn-create']) ?>
         </p>
         </section>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'spriceid',
            [
                'attribute' => 'sfitem_validfrom',
                'format' => ['date', 'php:d-m-Y']
            ],  
            [
                'attribute' => 'sfitem_validuntil',
                'format' => ['date', 'php:d-m-Y']
            ],  
            // 'cby',
            // 'cdate',
            // 'mby',
            // 'mdate',
            'note',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{update}&nbsp&nbsp&nbsp&nbsp{delete}',
            'buttons' => [
                    'delete' => function ($url, $model) {
                        $spriceItem = \app\models\MsellingFeeitem::find()->where('spriceid = :id', [':id' => $model->spriceid])->one();
                        $schema = \app\models\Mschema::find()->where('spriceid = :id', [':id' => $model->spriceid])->one();
                        if (is_null($spriceItem) && is_null($schema)) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'title' => Yii::t('app', 'Delete'),
                                        'data' => [
                                            'confirm' => Yii::$app->params['deleteConfirm'],
                                            'method' => 'post',
                                        ]
                            ]);
                        }
                    },
                ]
            ]
        ],
    ]); ?>
</div>
