<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Taccmutation */

$this->title = 'Create Taccmutation';
$this->params['breadcrumbs'][] = ['label' => 'Taccmutations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taccmutation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
