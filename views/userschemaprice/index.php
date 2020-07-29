<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Msellprice;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MschemaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Skema Price';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php //echo uran1980\yii\widgets\pace\Pace::widget(); ?>

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
   <P style="font-size: 30px; margin-top: -20px;">USER SCHEMA</P>  
<div class="muserschemaprice-index", style="margin-top: 40px">
    <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Tambah User Skema', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>
    <div id="musrenbang" style="overflow: auto;overflow-y: auto;overflow-x: visible;">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'spriceid',
            'userid',
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
                    }
                ]
            ]
        ],
    ]);?>
    </div>
</div>
