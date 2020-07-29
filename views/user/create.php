<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Muser */

$this->title = 'Tambah Pengguna';
$this->params['breadcrumbs'][] = ['label' => 'Musers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muser-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
