<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Update Transkansi mitra: ' . $model->front_trxid;
$this->params['breadcrumbs'][] = ['label' => 'tfront', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->front_trxid, 'url' => ['view', 'id' => $model->front_trxid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tfront-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
