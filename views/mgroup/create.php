<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MGroup */

$this->title = 'Create Mgroup';
$this->params['breadcrumbs'][] = ['label' => 'Mgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mgroup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
