<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mregrpoint */

$this->title = 'Ubah Mobile: ' . $model->mobileid;
$this->params['breadcrumbs'][] = ['label' => 'Mmobiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mobileid, 'url' => ['view', 'id' => $model->mobileid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mobile-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
