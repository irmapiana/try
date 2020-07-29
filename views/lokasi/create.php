<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Inflokasi */

$this->title = 'Create Inflokasi';
$this->params['breadcrumbs'][] = ['label' => 'Inflokasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inflokasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
