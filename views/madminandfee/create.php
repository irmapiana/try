<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mspriceadmin */

$this->title = 'Tambah Harga Admin';
$this->params['breadcrumbs'][] = ['label' => 'Madminandfee', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="madminandfee-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
