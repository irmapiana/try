<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Mregrpoint */

$this->title = 'Tambah Mobile';
$this->params['breadcrumbs'][] = ['label' => 'Mservices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mservice-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'dataParent' => $dataParent,
    ]) ?>

</div>
