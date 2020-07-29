<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */

$this->title = 'Tambah Produk';
$this->params['breadcrumbs'][] = ['label' => 'Mproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mproduct-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
