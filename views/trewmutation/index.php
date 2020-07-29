<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\PTotal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TrewmutationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detil Poin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trewmutation-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'reward_mutationid',
            'cdate',
            'userid',
            [
                'label' => 'POIN AWAL',
                  'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data->end_balance - $data->point) ;
                    
                },
            ],
              [
                'attribute' => 'POINT',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                     return PTotal::formatRupiah($data->point);
                },
            ],
                          [
                'attribute' => 'end_balance',
               'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                     return PTotal::formatRupiah($data->end_balance);
                },
            ],
            'remark',
            // 'cby',
            // 'mby',
            // 'mdate',
           /* [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}&nbsp&nbsp&nbsp&nbsp{delete}',
                
            ],*/
        ],
    ]);
    ?>
</div>
