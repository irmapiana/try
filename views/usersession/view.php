<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usersession */

$this->title = $model->SSID;
$this->params['breadcrumbs'][] = ['label' => 'Usersessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usersession-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->SSID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->SSID], [
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
            'SSID',
            'SECRETKEY',
            'IMEIID',
            'userid',
        ],
    ]) ?>

</div>
