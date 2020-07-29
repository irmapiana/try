<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Taccmutationdetails */

$this->title = 'Create Taccmutationdetails';
$this->params['breadcrumbs'][] = ['label' => 'Taccmutationdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taccmutationdetails-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
