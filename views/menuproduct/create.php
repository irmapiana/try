<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Tambah Menu Product';
$this->params['breadcrumbs'][] = ['label' => 'menuproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menuproduct-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
