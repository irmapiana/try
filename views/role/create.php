<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mwebgroup */

$this->title = 'Tambah Group Pengguna';
$this->params['breadcrumbs'][] = ['label' => 'Mwebgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mwebgroup-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
