<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Msellprice */

$this->title = 'Ubah Grup Harga: ' . $model->ppitemid;
$this->params['breadcrumbs'][] = ['label' => 'Msellprices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ppitemid, 'url' => ['view', 'id' => $model->ppitemid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="msellprice-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'used' => $used
    ]) ?>

</div>
