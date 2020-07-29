<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->identifier;
$this->params['breadcrumbs'][] = ['label' => 'Mmconfigs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="mmconfig-view">
    <?= Html::encode($this->title) ?>

    <p>
        <?= Html::a('Update', ['update', 'identifier' => $model->identifier], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'identifier' => $model->identifier], [
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
            'identifier',
            'url_mode',
            'active',
            'value',
            ],
        ]) ?>
</div>