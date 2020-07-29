<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Mgroupmenuitem;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BankSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Group Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<p style="font-size: 30px; margin-top: -20px;">Group Menu Item</p>

<div class="mgroupmenuitem-index", style="margin-top: 40px">

    <section class="btn btn-create", style="margin-top: 90px;">
        <?= Html::a('Tambah Group Menu',['create'],['class' => 'btn btn-success']) ?>
    </section>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'group_menuid',
            'resourceid',
            'itemid',
            'item_seq',
            // 'mby',
            // 'mdate',
            // 'active',

            ['class' => 'yii\grid\ActionColumn',
            'header' => 'ACTIONS',
            'template'=> '{update} &nbsp; &nbsp; {delete}',
                        ]
                    ],
            ]); ?>
</div>
