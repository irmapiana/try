<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Taccmutationtmp */

$this->title = 'Tambah Persetujuan Akun';
$this->params['breadcrumbs'][] = ['label' => 'Taccmutationtmps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taccmutationtmp-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
