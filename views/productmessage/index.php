<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productmessage';
$this->params['breadcrumbs'][] = $this->title;
?>
 <P style="font-size: 30px; margin-top: -20px;">PRODUK MESSAGE</P>
    
<div class="productmessage-index", style="margin-top: 40px;">

    <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Tambah Product Message', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'productid',
            'itemid',
            'message_prefix',

             ['class' => 'yii\grid\ActionColumn',
            'header' => 'action',
            'template' => '{update} &nbsp; &nbsp; {delete}'],
        ],
    ]); ?>
</div>
