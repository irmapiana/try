<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */

$this->title = 'Tambah Rek';
$this->params['breadcrumbs'][] = ['label' => 'Mregistration', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mregistration-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
