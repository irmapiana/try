<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Taccmutation */

$this->title = 'Update Taccmutation: ' . $model->MUTATIONID;
$this->params['breadcrumbs'][] = ['label' => 'Taccmutations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MUTATIONID, 'url' => ['view', 'id' => $model->MUTATIONID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="taccmutation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
