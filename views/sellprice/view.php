<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Msellprice */

$this->title = $model->ppitemid;
$this->params['breadcrumbs'][] = ['label' => 'Msellprice', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msellprice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ppitemid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ppitemid], [
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
            'ppitemid',
            'spriceid',
            'ppitem_validfrom',
            'ppitem_validuntil',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
