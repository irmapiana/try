<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usersession */

$this->title = 'Create BroadCast';
$this->params['breadcrumbs'][] = ['label' => 'Broadcast', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="broadcast-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
