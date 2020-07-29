<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dproductitem */

$this->title = $model->productid;
$this->params['breadcrumbs'][] = ['label' => 'Dproductitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dproductitem-view">

    <p>
        <?= Html::a('Ubah', ['update', 'productid' => $model->productid, 'itemid' => $model->itemid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'productid' => $model->productid, 'itemid' => $model->itemid], [
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
            'productid',
            'itemid',
            'itemname',
            'note',
            'active',
            'cby',
            'cdate',
            'mby',
            'mdate',
            'transaction_type',
            'denom',
            'shortname',
            'header_receipt',
            'nominal_alias',
            'footer_receipt',
            'denom_notation',
            'logo',
        ],
    ]) ?>

</div>
