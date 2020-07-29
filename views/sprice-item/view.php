<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Mspriceitem */

$this->title = $model->sfitemid;
$this->params['breadcrumbs'][] = ['label' => 'sfitemid', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mspriceitem-view">

    <p>
        <?= Html::a('Ubah', ['update', 'id' => $model->sfitemid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->sfitemid], [
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
            'sfitemid',
            'spriceid',
            'productid',
            'itemid',
            'sfitem_fee',
            'sfitem_validfrom',
            'sfitem_validuntil',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
