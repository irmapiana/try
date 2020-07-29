<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MMenugroup */

$this->title = 'Create Mmenugroup';
$this->params['breadcrumbs'][] = ['label' => 'Mmenugroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmenugroup-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
