<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaccmutationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Taccmutations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taccmutation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="taccmutation-index", style="margin-right: 1100px; background-color: #fff; background-size: -50px;" onclick="showSettingDropdown()">
                <p style="font-size: 20px; font-style: bold;">
         <?= Html::a('Create Taccmutation', ['create'], ['class="taccmutation-index"'],['class' => 'btn btn-success']) ?>
         </p>
         </section>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MUTATIONID',
            'userid',
            'MTYPE',
            'AMOUNT',
            'noteS',
            // 'BDATE',
            // 'cby',
            // 'cdate',
            // 'mby',
            // 'mdate',
            // 'SCHEMAID',
            // 'sch_updatedD',
            // 'ENDBALANCE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
