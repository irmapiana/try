<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unblok Akun';
$this->params['breadcrumbs'][] = $this->title;
?>
 <P style="font-size: 30px; margin-top: -20px;">UNBLOCK AKUN</P>
    
<div class="block-index", style="margin-top: 40px;">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'accountno',
            'account_name',
            'userid',
	    'logindate',
	    'flag',
	    'card_number',
            ['class' => 'yii\grid\ActionColumn',
            'header' => 'ACTIONS',
                'template' => '{unblock}',
                'buttons' => [
                    'unblock' => function($url, $models){
                        return Html::a('unblock',['/block/unblock', 'userid'=>$models['userid']],['class'=>'btn btn-primary']);
                       exit();
                    }
                ]            
	    ],
        ],
    ]); ?>
</div>
