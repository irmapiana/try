<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mschema */

$this->title = 'Update Mschema: ' . $model->schemaid;
$this->params['breadcrumbs'][] = ['label' => 'Mschemas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->schemaid, 'url' => ['view', 'schemaid' => $model->schemaid, 'sch_updated' => $model->sch_updated]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mschema-update">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
