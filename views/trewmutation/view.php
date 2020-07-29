<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Trewmutation */

$this->title = $model->reward_mutationid;
$this->params['breadcrumbs'][] = ['label' => 'Trewmutations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trewmutation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->reward_mutationid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->reward_mutationid], [
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
            'reward_mutationid',
            'userid',
            'mtype',
            'point',
            'end_balance',
            'remark',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
