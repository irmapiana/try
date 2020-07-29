<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mspriceitem */

$this->title = 'Ubah Harga Item: ' . $model->sfitemid;
$this->params['breadcrumbs'][] = ['label' => 'Mspriceitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sfitemid, 'url' => ['view', 'id' => $model->sfitemid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mspriceitem-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
