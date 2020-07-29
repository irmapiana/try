<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Create Igate Product Mapper';
$this->params['breadcrumbs'][] = ['label' => 'Igateproductmappers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Igateproductmapper-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
