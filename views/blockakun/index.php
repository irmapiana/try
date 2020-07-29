<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Block Akun';
$this->params['breadcrumbs'][] = $this->title;
?>
 <P style="font-size: 30px; margin-top: -20px;">BLOCK AKUN</P>
    
<div class="blockakun-index", style="margin-top: 40px;">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'accountno',
            'account_name',
            'userid',
            // 'MBY',
            // 'MDATE',
            // 'ACTIVE',

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'ACTIONS',
                'template' => '{block}',
                'buttons' => [
                    'block' => function($url, $models, $userid){
                        return Html::a('block',['/blockakun/block', 'userid' => $models['userid']],['class'=>'btn btn-primary']);
                       exit();
                    }
                ]
            ],
        ],
    ]); ?>
</div>
