<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Taccmutationdetails */

$this->title = 'Update Taccmutationdetails: ' . $model->MUTATION_ID;
$this->params['breadcrumbs'][] = ['label' => 'Taccmutationdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MUTATION_ID, 'url' => ['view', 'id' => $model->MUTATION_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="taccmutationdetails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
