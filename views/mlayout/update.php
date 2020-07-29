<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Inflokasi */

$this->title = 'Update Layout: ' . $model->layoutid;
$this->params['breadcrumbs'][] = ['label' => 'Mlayouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->layoutid, 'url' => ['view', 'id' => $model->layoutid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mlayout-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
