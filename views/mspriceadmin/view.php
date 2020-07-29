<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mspriceadmin */

$this->title = $model->aitemid;
$this->params['breadcrumbs'][] = ['label' => 'Mspriceadmin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mspriceadmin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->aitemid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->aitemid], [
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
            'aitemid',
            'spriceid',
            'productid',
            'itemid',
            'aitem_fee',
            'aitem_validfrom',
            'aitem_validuntil',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
