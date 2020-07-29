<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Tfront */

$this->title = 'Tambah Transaksi Mitra';
$this->params['breadcrumbs'][] = ['label' => 'Tfronts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tfront-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
