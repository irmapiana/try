<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\MsalescommissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Msalescommissions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msalescommission-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="msalescommission-index", style="margin-right: 1100px; background-color: #fff; background-size: -50px;" onclick="showSettingDropdown()">
                <p style="font-size: 20px; font-style: bold;">
         <?= Html::a('Create Msalescommission', ['create'], ['class="msalescommission-index"'],['class' => 'btn btn-success btn-create']) ?>
         </p>
         </section>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'SCOMMISSIONID',
            'spriceid',
            'productid',
            'itemid',
            'SCOMMISSION_0',
            // 'SCOMMISSION_1',
            // 'SCOMMISSION_2',
            // 'SCOMMISSION_VALIDFROM',
            // 'SCOMMISSION_VALIDUNTIL',
            // 'cby',
            // 'cdate',
            // 'mby',
            // 'mdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
