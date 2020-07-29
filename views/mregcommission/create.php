<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mregcommission */

$this->title = 'Tambah Komisi Registrasi';
$this->params['breadcrumbs'][] = ['label' => 'Mregcommissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mregcommission-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
