<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Mlayout;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InflokasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Layout';
$this->params['breadcrumbs'][] = $this->title;
?>
<p style="font-size: 30px; margin-top: -20px;">LAYOUT</p>

<div class="mlayout-index", style="margin-top: 40px">
    <section class="btn btn-create", style="margin-top: 90px;">
        <?=Html::a('Tambah Layout',['create'],['class'=>'btn btn-success']) ?>
    </section>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'layoutid',
            'width',
            'length',
            // 'LOKASI_KECAMATAN',
            // 'LOKASI_KELURAHAN',

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'ACTIONS',
            'template' => '{update}{delete}',
        ]
        ],
    ]); ?>
</div>
