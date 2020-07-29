<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Msellprice */

$this->title = 'Tambah Grup Harga';
$this->params['breadcrumbs'][] = ['label' => 'Msellprices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msellprice-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
