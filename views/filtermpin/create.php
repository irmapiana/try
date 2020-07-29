<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Create Mpin';
$this->params['breadcrumbs'][] = ['label' => 'Filtermpins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filtermpin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
