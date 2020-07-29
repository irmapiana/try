<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Morg */

$this->title = 'Ubah Organisasi: ' . $model->ORGID;
$this->params['breadcrumbs'][] = ['label' => 'Morgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ORGID, 'url' => ['view', 'id' => $model->ORGID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="morg-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'dataParent' => $dataParent,
    ]) ?>

</div>
