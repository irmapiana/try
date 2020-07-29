<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tfront */

$this->title = 'Ubah Transaksi Provider: ' . $model->front_trxid;
$this->params['breadcrumbs'][] = ['label' => 'Tbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->front_trxid, 'url' => ['view', 'id' => $model->front_trxid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tback-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
