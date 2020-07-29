<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MMenugroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu Group';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmenugroup-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="mmenugroup-index", style="margin-top: 40px;">

    <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Tambah Menu Group', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'menucode',
            'group_user',
            // 'mby',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
