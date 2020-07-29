<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mregcommission */

$this->title = 'Ubah Komisi Registrasi: ' . $model->RCOMMISSIONID;
$this->params['breadcrumbs'][] = ['label' => 'Mregcommissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->RCOMMISSIONID, 'url' => ['view', 'id' => $model->RCOMMISSIONID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mregcommission-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
