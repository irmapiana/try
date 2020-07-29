<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\broadcast */

$this->title = $model->SSID;
$this->params['breadcrumbs'][] = ['label' => 'broadcasts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="broadcast-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->TOPICID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->TOPICID], [
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
            'TOPICID',
			'TITLE',
			'POSTDATE',
			'POSTBY',
			'MESSAGE',
			'MESSAGEID',
        ],
    ]) ?>

</div>
