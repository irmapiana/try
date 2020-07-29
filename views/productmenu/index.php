<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Productmenu';
$this->params['breadcrumbs'][] = $this->title;
?>
 <P style="font-size: 30px; margin-top: -20px;">PRODUK GROUP MENU</P>
    
<div class="productmenu-index", style="margin-top: 40px;">

    <section class="btn btn-create", style=" margin-top: 90px;">
        
        <?= Html::a('Tambah Product Menu', ['create'], ['class' => 'btn btn-success']) ?>
    
</section>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'group_menuid',
            'itemid',
            'item_seq',
            'next_class',
            'active',

             ['class' => 'yii\grid\ActionColumn',
            'header' => 'action',
            'template' => '{update} &nbsp; &nbsp; {delete}'],
        ],
    ]); ?>
</div>
