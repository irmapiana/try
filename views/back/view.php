<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tfront */

$this->title = $model->front_trxid;
$this->params['breadcrumbs'][] = ['label' => 'Tbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tback-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->front_trxid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->front_trxid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'front_trxid',
            'accountno',
            'productid',
            'itemid',
            'tdate',
            'settlflag',
            'rc',
        ],
    ]) ?>

</div>
