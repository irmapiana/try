<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Update productid: ' . $model->productid;
$this->params['breadcrumbs'][] = ['label' => 'igateproductmapper', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->productid, 'url' => ['view', 'id' => $model->productid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="igateproductmapper-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
