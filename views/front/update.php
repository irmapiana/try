<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Tfront */

$this->title = 'Ubah Transaksi Mitra: ' . $model->FRONT_TRXID;
$this->params['breadcrumbs'][] = ['label' => 'Tfronts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->FRONT_TRXID, 'url' => ['view', 'id' => $model->FRONT_TRXID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tfront-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
