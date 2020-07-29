<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dproductitem */

$this->title = 'Tambah Item Produk';
$this->params['breadcrumbs'][] = ['label' => 'Dproductitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dproductitem-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
