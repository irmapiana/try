<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Tambah RC Mapper';
$this->params['breadcrumbs'][] = ['label' => 'rcmappers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rcmapper-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
