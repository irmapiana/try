<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Morg;
use app\models\Bank;
use app\models\Maccount;
use app\models\Mcalendar;
use app\models\Msellprice;
use app\models\Mschema;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MschemaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Skema';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php //echo uran1980\yii\widgets\pace\Pace::widget(); ?>

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
   <P style="font-size: 30px; margin-top: -40px;">SCHEMA</P>  
<div class="mschema-index">
    <section class="btn btn-success btn-create", style=" margin-top: 40px;">
        
        <?= Html::a('Tambah Skema', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>
    <div id="musrenbang" style="overflow: auto;overflow-y: auto;overflow-x: visible;">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'schemaid',         
            [
                'attribute' => 'active',
                /*'value' => function($data){
                    return $data->FIX_CA_ADMINFEE = 0 ? 'N' : 'Y';
                }*/
                'filter' => ['Y' => 'Yes', 'N' => 'No'],
            ],
            [
                'attribute' => 'admininclude',
                'value' => function($data){
                    return $data->admininclude == 1 ? 'Y' :  'N' ;
                },
                'filter' => [1 => 'Yes', 0 => 'No'],
            ],
            'productid',
            'itemid',
            [
                'attribute' => 'itype',
                'contentOptions' => ['style' => 'text-align: center;'],
                'value' => function ($data) {
                    return $data->itype =  'C' ? 'Collecting Agent' : 'Biller';
                },
                'format'=>'raw',
            ],
            [
                'attribute' => 'admininclude',
                'value' => function($data){
                    return $data->admininclude == 1 ? 'Y' :  'N' ;
                },
                'filter' => [1 => 'Yes', 0 => 'No'],
            ],
            [
                'attribute' => 'fix_ca_adminfee',
                /*'value' => function($data){
                    return $data->FIX_CA_ADMINFEE = 0 ? 'N' : 'Y';
                }*/
                'filter' => ['Y' => 'Yes', 'N' => 'No'],
            ],
            'ca_adminfee',
            [
                'attribute' => 'spriceid',
              /*  'value' => function($data){
                    return $data->spriceid = 0 ? 'AGENT_PRICE' : 'DEALER_PRICE';
                },*/            
                'filter' => Html::activeDropDownList($searchModel, 'spriceid', ArrayHelper::map(Msellprice::find()->orderBy(['spriceid' => SORT_ASC])->asArray()->all(), 'spriceid', 'spriceid'), ['class' => 'form-control', 'prompt' => 'Semua Harga']),
            ],
           // 'C',
            'ppriceid',
            [
                'attribute' => 'KALENDER',
                'value' => function($data){
                    if($data->calendarid){
                        $getCalender = Mschema::find()->where('calendarid = :id',[':id' => $data->calendarid])->one();
                        return $getCalender->calendarid;
                    }
                },
                'filter' => Html::activeDropDownList($searchModel, 'calendarid', ArrayHelper::map(Mschema::find()->orderBy(['calendarid' => SORT_ASC])->asArray()->all(), 'calendarid', 'calendarid'), ['class' => 'form-control', 'prompt' => 'Semua Kalendar']),
            ],
            'classname',
            'converter',
            'destinationid',
            // 'sch_updatedD',
            // 'cby',
            // 'cdate',
            // 'mby',
            // 'mdate',
            // 'CLASSNAME',
            // 'CA_ADMINFEE',
            // 'FIX_CA_ADMINFEE',
            // 'CASHBACKID',
            // 'MINUS_FACTOR',
            // 'PLUS_FACTOR',
            // 'INVOICE_METHOD',
            // 'PPN',
            // 'BANKCODE',
            // 'ORGID',
            // 'active',
            // 'CONVERTER',
            // 'DESTINATIONID',
            // 'RECON_CODE',
            // 'PID',
            // 'userid',
            // 'CID',
            // 'MULTIPLY_FACTOR',
            // 'FEEBASE',
            // 'UPDATED',
            // 'CALENDARID',
            // 'ADMININCLUDE',
            // 'INPUT1',
            // 'INPUT2',
            // 'INPUT3',
            // 'INPUT4',
            // 'spriceid',
            // 'PPRICEID',

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
</div>
