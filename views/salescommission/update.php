<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Msalescommission */

$this->title = 'Ubah Komisi: ' . $model->SCOMMISSIONID;
$this->params['breadcrumbs'][] = ['label' => 'Msalescommissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SCOMMISSIONID, 'url' => ['view', 'id' => $model->SCOMMISSIONID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="msalescommission-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
