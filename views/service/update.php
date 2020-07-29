<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mregrpoint */

$this->title = 'Ubah service: ' . $model->service_name;
$this->params['breadcrumbs'][] = ['label' => 'Mservices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->service_name, 'url' => ['view', 'id' => $model->service_name]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
