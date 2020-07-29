<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaccmutationdetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Taccmutationdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taccmutationdetails-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="taccmutationdetails-index", style="margin-right: 1100px; background-color: #fff; background-size: -50px;" onclick="showSettingDropdown()">
                <p style="font-size: 20px; font-style: bold;">
         <?= Html::a('Create Taccmutationdetails', ['create'], ['class="taccmutationdetails-index"'],['class' => 'btn btn-success']) ?>
         </p>
         </section>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MUTATION_ID',
            'BANK_ACCOUNT_ID',
            'MUTATION_STATUS_CODE',
            'cby',
            'cdate',
            // 'mby',
            // 'mdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
