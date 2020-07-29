<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Mresource;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\broadcastSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Resource';
$this->params['breadcrumbs'][] = $this->title;
?>
<p style="font-size: 30px; margin-top: -20px">RESOURCE</p>

<div class="mresource-index", style="margin-top: 40px">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="btn btn-create", style="margin-top: 90px;">
        <?= Html::a('Tambah Resource', ['create'], ['class' => 'btn btn-success']) ?>
    </section>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'resourceid',
            'resource_type',
            'resource_url',
            'layout_id',

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'Action',
            'template' => '{update} &nbsp; &nbsp; {delete}',
            ]
        ],
    ]); ?>
</div>
