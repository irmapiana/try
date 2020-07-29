<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mregcommission */

$this->title = $model->RCOMMISSIONID;
$this->params['breadcrumbs'][] = ['label' => 'Komisi Regristrasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mregcommission-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->RCOMMISSIONID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->RCOMMISSIONID], [
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
            'RCOMMISSIONID',
            'RCLEVEL_CODE',
            'REGCOST',
            'CASHBACK_0',
            'RCOMMISSION_1',
            'RCOMMISSION_2',
            'RCOMMISSION_VALIDFROM',
            'RCOMMISSION_VALIDUNTIL',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
