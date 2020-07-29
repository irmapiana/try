<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Msellprice */

$this->title = 'Tambah Grup Harga';
$this->params['breadcrumbs'][] = ['label' => 'MsellingFeeitem', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="MsellingFeeitem-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
