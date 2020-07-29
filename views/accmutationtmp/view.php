<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Taccmutationtmp */

$this->title = $model->MUTATIONID;
$this->params['breadcrumbs'][] = ['label' => 'Taccmutationtmps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taccmutationtmp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->MUTATIONID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->MUTATIONID], [
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
            'MUTATIONID',
            'userid',
            'MTYPE',
            'AMOUNT',
            'noteS',
            'BDATE',
            'cby',
            'cdate',
            'mby',
            'mdate',
            'SCHEMAID',
            'sch_updatedD',
            'ENDBALANCE',
        ],
    ]) ?>

</div>
