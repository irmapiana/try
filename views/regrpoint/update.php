<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mregrpoint */

$this->title = 'Ubah Poin Registrasi: ' . $model->RRPOINTID;
$this->params['breadcrumbs'][] = ['label' => 'Mregrpoints', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->RRPOINTID, 'url' => ['view', 'id' => $model->RRPOINTID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mregrpoint-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
