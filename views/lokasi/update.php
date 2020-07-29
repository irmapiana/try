<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Inflokasi */

$this->title = 'Update Inflokasi: ' . $model->LOKASI_ID;
$this->params['breadcrumbs'][] = ['label' => 'Inflokasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->LOKASI_ID, 'url' => ['view', 'id' => $model->LOKASI_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inflokasi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
