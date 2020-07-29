<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */

$this->title = 'Ubah Produk Mapper: ' . $model->productid1;
$this->params['breadcrumbs'][] = ['label' => 'Mproductmappers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->productid1, 'url' => ['view', 'id' => $model->productid1]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mproductmapper-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
