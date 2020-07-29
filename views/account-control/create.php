<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Msalescommission */

$this->title = 'Create Msalescommission';
$this->params['breadcrumbs'][] = ['label' => 'Msalescommissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msalescommission-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
