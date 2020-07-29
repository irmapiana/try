<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Mspriceitem */

$this->title = 'Tambah Harga Item';
$this->params['breadcrumbs'][] = ['label' => 'Mpurchasepriceitem', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mpurchasepriceitem-create">


    <?= $this->render('_form', [
        'model' => $model,
        'from' => isset($from) ? $from : null,
    ]) ?>

</div>
