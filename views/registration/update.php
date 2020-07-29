<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */

$this->title = 'Ubah REK: ' . $model->account_no;
$this->params['breadcrumbs'][] = ['label' => 'Mregistrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->account_no, 'url' => ['view', 'id' => $model->account_no]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mregistrations-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
