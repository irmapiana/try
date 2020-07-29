<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MMenugroup */

$this->title = 'Update Mmenugroup: ' . $model->group_user;
$this->params['breadcrumbs'][] = ['label' => 'Mmenugroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group_user, 'url' => ['view', 'group_user' => $model->group_user, 'menucode' => $model->menucode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mmenugroup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
