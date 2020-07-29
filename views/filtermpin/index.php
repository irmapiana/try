<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'MPIN';
$this->params['breadcrumbs'][] = $this->title;
?>
 <P style="font-size: 30px; margin-top: -20px;">Filter MPIN</P>
    
<div class="filtermpin-index", style="margin-top: 40px;">

    <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Tambah MPIN', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mpin',
            // 'MBY',
            // 'MDATE',
            // 'ACTIVE',

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'action',
            'template' => '{update} &nbsp; &nbsp; {delete}'],
        ],
    ]); ?>
</div>
