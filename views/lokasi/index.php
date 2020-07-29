<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InflokasiSearch */
/* @var $dataProvider yii\data\activeDataProvider */

$this->title = 'Inflokasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inflokasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="inflokasi-index", style="margin-right: 1100px; background-color: #fff; background-size: -50px;" onclick="showSettingDropdown()">
                <p style="font-size: 20px; font-style: bold;">
         <?= Html::a('Create Inflokasi', ['create'], ['class="inflokasi-index"'],['class' => 'btn btn-success']) ?>
         </p>
         </section>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'LOKASI_ID',
            'LOKASI_KODE',
            'LOKASI_NAMA',
            'LOKASI_PROPINSI',
            'LOKASI_KABUPATENKOTA',
            // 'LOKASI_KECAMATAN',
            // 'LOKASI_KELURAHAN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
