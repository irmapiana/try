<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mspriceadmin */

$this->title = 'Tambah Harga Admin';
$this->params['breadcrumbs'][] = ['label' => 'Mspriceadmin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mspriceadmin-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
