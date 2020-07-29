<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */

$this->title = 'Ubah Produk: ' . $model->productid;
$this->params['breadcrumbs'][] = ['label' => 'Mproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->productid, 'url' => ['view', 'id' => $model->productid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mproduct-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'used' => $used,
    ]) ?>

</div>
