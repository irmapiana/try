<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Msalesreward */

$this->title = $model->reward_typeid;
$this->params['breadcrumbs'][] = ['label' => 'Msalesrewards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msalesreward-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->reward_typeid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->reward_typeid], [
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
            'reward_typeid',
            'spriceid',
            'productid',
            'itemid',
            'reward_minimum',
            'reward_maximum',
            'rewarditem_validfrom',
            'rewarditem_validuntil',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
