<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usersession */

$this->title = 'Create Usersession';
$this->params['breadcrumbs'][] = ['label' => 'Usersessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usersession-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
