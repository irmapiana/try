<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Request;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Mitra';
$this->params['breadcrumbs'][] = $this->title;
?>
 <P style="font-size: 30px; margin-top: -20px;">Transaksi Mitra</P>
    
    <div class="tfront-index", style="margin-top: 40px;">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'front_trxid',
            'enc_subscriber_id',
            'subscriber_name',
            'userid', 
            'accountno',
            'productid',
            'itemid',
            'amount',
            'admin_fee',
            'purchase_price',
            'selling_fee',
            'sell_price',
            'rc',
            'settlflag',
            [
                'attribute' => 'tdate',
                'value' => 'tdate',
                'format' => 'raw',
                'label' => "Tanggal",
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'name' => 'tdate',
                    'value' => ArrayHelper::getValue($_GET, 'tdate'),
                    'pluginOptions' =>[
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                    ],
                ]),
            ],
            // 'MBY',
            // 'MDATE',
            // 'ACTIVE',
        ],
    ]); ?>
</div>
