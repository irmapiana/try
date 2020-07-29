<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */

$this->title = $model->itemid;
$this->params['breadcrumbs'][] = ['label' => 'Mitemresources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mitemresource-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->itemid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->itemid], [
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
            'itemid',
            'resourceid',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
