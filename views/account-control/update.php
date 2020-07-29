<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Msalescommission */

$this->title = 'Update Msalescommission: ' . $model->SCOMMISSIONID;
$this->params['breadcrumbs'][] = ['label' => 'Msalescommissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SCOMMISSIONID, 'url' => ['view', 'id' => $model->SCOMMISSIONID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="msalescommission-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
