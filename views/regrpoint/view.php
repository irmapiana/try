<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Mregrpoint */

$this->title = $model->RRPOINTID;
$this->params['breadcrumbs'][] = ['label' => 'Mregrpoints', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mregrpoint-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->RRPOINTID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->RRPOINTID], [
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
            'RRPOINTID',
            'RRPLEVEL_CODE',
            'RRPOINT_0',
            'RRPOINT_1',
            'RRPOINT_2',
            'RRPOINT_VALIDFROM',
            'RRPOINT_VALIDUNTIL',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
