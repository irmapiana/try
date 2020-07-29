<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Msalesreward */

$this->title = 'Ubah Reward: ' . $model->reward_typeid;
$this->params['breadcrumbs'][] = ['label' => 'Msalesrewards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reward_typeid, 'url' => ['view', 'id' => $model->reward_typeid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="msalesreward-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
