<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Dproductitem */

$this->title = 'Ubah Item: ' . $model->productid;
$this->params['breadcrumbs'][] = ['label' => 'Dproductitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->productid, 'url' => ['view', 'productid' => $model->productid, 'itemid' => $model->itemid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dproductitem-update">

    <?= $this->render('_form', [
        'model' => $model,
        'used' => $used,
    ]) ?>

</div>
