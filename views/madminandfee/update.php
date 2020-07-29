<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mspriceadmin */

$this->title = 'Ubah Harga Admin: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Madminandfees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="madminandfee-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
