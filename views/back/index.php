<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Request;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TfrontSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Provider';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tback-index" style="margin-top: 40px;">
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'front_trxid',
            'accountno',
            'productid',
            'itemid',
            'settlflag',
            'rc',
            [
                'attribute' => 'tdate',
                'value' => 'tdate',
                'format' => 'raw',
                'label' => "Tanggal",
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'name' => 'tdate',
                    'value' => ArrayHelper::getValue($_GET, "tdate"),
                    'pluginOptions' =>[
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                    ],
                ]),
            ],
            /*[
                'attribute' => 'ISO Message',
                'value' => function($data) {
                    return $data->backadd->isomsg;
                },
            ],*/
        ],
    ]); ?>
</div>
