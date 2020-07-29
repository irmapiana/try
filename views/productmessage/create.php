<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Tambah Product Message';
$this->params['breadcrumbs'][] = ['label' => 'productmessages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productmessage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
