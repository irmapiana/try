<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Morg */

$this->title = 'Tambah Organisasi';
$this->params['breadcrumbs'][] = ['label' => 'Morgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="morg-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'dataParent' => $dataParent,
    ]) ?>

</div>
