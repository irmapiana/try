<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Maccount */

$this->title = 'Ubah Akun: ' . $model->account_name;
$this->params['breadcrumbs'][] = ['label' => 'Maccounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->account_name, 'url' => ['view', 'id' => $model->userid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maccount-update">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'used' => $used,
    ]) ?>

</div>
