<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mgroups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mgroup-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="mgroup-index", style="margin-right: 1100px; background-color: #fff; background-size: -50px;" onclick="showSettingDropdown()">
                <p style="font-size: 20px; font-style: bold;">
         <?= Html::a('Create Mgroup', ['create'], ['class="mgroup-index"'],['class' => 'btn btn-success']) ?>
         </p>
         </section>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'GROUPID',
            'note',
            'cby',
            'cdate',
            'mby',
            // 'mdate',
            // 'GROUPNAME',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
