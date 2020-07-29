<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\broadcast */

$this->title = $model->resourceid;
$this->params['breadcrumbs'][] = ['label' => 'Mresources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mresource-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->resourceid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->resourceid], [
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
            'resourceid',
			'resource_type',
			'resource_url',
			'layout_id',
			'cby',
			'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
