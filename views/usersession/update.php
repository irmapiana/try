<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usersession */

$this->title = 'Update Usersession: ' . $model->SSID;
$this->params['breadcrumbs'][] = ['label' => 'Usersessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->SSID, 'url' => ['view', 'id' => $model->SSID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usersession-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
