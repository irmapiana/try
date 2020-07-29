<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Mspriceitem */

$this->title = $model->PPitemid;
$this->params['breadcrumbs'][] = ['label' => 'Mpurchasepriceitem', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mpurchasepriceitem-view">

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->SPitemid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->SPitemid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
         <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PPitemid',
            'spriceid',
            'productid',
            'itemid',
            'PPITEM_PRICE',
            'PPITEM_VALIDFROM',
            'SPITEM_VALIDUNTIL',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
