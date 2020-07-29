<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Msellprice */

$this->title = 'Ubah Grup Harga: ' . $model->spriceid;
$this->params['breadcrumbs'][] = ['label' => 'MsellingFeeitem', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->spriceid, 'url' => ['view', 'id' => $model->spriceid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="MsellingFeeitem-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'used' => $used
    ]) ?>

</div>
