<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Inflokasi */

$this->title = 'Create Layout';
$this->params['breadcrumbs'][] = ['label' => 'mlayouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mlayout-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
