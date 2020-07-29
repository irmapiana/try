<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */

$this->title = 'Ubah item resource: ' . $model->itemid;
$this->params['breadcrumbs'][] = ['label' => 'Mitemresources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->itemid, 'url' => ['view', 'id' => $model->itemid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mitemresource-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
