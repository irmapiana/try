<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mspriceitem */

$this->title = 'Ubah Harga Item: ' . $model->PPitemid;
$this->params['breadcrumbs'][] = ['label' => 'Mspriceitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PPitemid, 'url' => ['view', 'id' => $model->PPitemid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mspriceitem-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
