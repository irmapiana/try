<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Update Promo: ' . $model->promo_seq;
$this->params['breadcrumbs'][] = ['label' => 'promo', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->promo_seq, 'url' => ['view', 'id' => $model->promo_seq]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
