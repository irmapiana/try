<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Update Mpin: ' . $model->mpin;
$this->params['breadcrumbs'][] = ['label' => 'filtermpin', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mpin, 'url' => ['view', 'id' => $model->mpin]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="filtermpin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
