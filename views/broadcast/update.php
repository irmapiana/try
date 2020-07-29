<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\broadcast */

$this->title = 'Update Broadcast: ' . $model->TOPICID;
$this->params['breadcrumbs'][] = ['label' => 'Broadcasts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TOPICID, 'url' => ['view', 'id' => $model->TOPICID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="broadcast-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
            ]) ?>

</div>
