<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Mregrpoint */

$this->title = 'Tambah Point Registrasi';
$this->params['breadcrumbs'][] = ['label' => 'Mregrpoints', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mregrpoint-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
