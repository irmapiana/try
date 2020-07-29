<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Mmobile;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\MregrpointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mobile';
$this->params['breadcrumbs'][] = $this->title;
?>
<p style="font-size: 30px; margin-top: -20px;">MOBILE</p>

<div class="mmobile-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mobileid',
            'mobilepin',
             [
                'attribute' => 'mobileno',
                'value' => function ($data) {
                    // Tipe datanya: timestamp
                    return substr($data->mobileno, 0, 4)."XXXX".substr($data->mobileno,-4);
                }
            ],
            'deviceid',

            // 'RRPOINTID'
            // 'cby',
            // 'cdate',
            // 'mby',
            // 'mdate',
        ],
    ]);
?>
</div>
