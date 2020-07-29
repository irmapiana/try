<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mspriceadmin */

$this->title = 'Ubah Harga Admin: ' . $model->aitemid;
$this->params['breadcrumbs'][] = ['label' => 'Mspriceadmin', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->aitemid, 'url' => ['view', 'id' => $model->aitemid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mspriceadmin-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
