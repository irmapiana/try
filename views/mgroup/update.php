<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MGroup */

$this->title = 'Update Mgroup: ' . $model->GROUPID;
$this->params['breadcrumbs'][] = ['label' => 'Mgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->GROUPID, 'url' => ['view', 'id' => $model->GROUPID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mgroup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
