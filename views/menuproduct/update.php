<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Update Menu Product: ' . $model->productid;
$this->params['breadcrumbs'][] = ['label' => 'Menuproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->productid, 'url' => ['view', 'id' => $model->productid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="menuproduct-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
