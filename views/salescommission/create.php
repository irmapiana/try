<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Msalescommission */

$this->title = 'Tambah Komisi';
$this->params['breadcrumbs'][] = ['label' => 'Komisi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msalescommission-create">


    <?= $this->render('_form', [
        'model' => $model,
        'from' => isset($from) ? $from : null,
    ]) ?>

</div>
