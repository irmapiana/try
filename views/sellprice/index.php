<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MsellpriceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchase Price';
$this->params['breadcrumbs'][] = $this->title;
?>

<P style="font-size: 30px; margin-top: -20px;">PURCHASE PRICE</P>

<div class="msellprice-index", style="margin-top: 40px">

   <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Tambah Grup Harga', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>
<br>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ppitemid',
            'spriceid', 
            'ppitem_validfrom',
            'ppitem_validuntil',
            // 'CBY',
            // 'CDATE',
            // 'MBY',
            // 'MDATE',

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
