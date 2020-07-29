<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DproductitemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ITEM';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<P style="font-size: 30px; margin-top: -20px;">PRODUK ITEM</P>

<div class="dproductitem-index", style="margin-top: 40px;"">

        <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Tambah Item', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'productid',
            'itemid',
            'itemname',
            'transaction_type',
            'denom',
            'shortname',
            'header_receipt',
            'nominal_alias',
            'footer_receipt',
            'denom_notation',
            'logo',
            [
                'attribute' => 'active',
                'contentOptions' => ['style' => 'width:50px;text-align: center;'],
            ],
            'note',
            // 'MBY',
            // 'MDATE',
            // 'itemname',
            // 'ACTIVE',

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'ACTIONS',
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
