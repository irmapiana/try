<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mwebgroup */

$this->title = 'Ubah Group Pengguna ' ;
$this->params['breadcrumbs'][] = ['label' => 'Mwebgroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group_user, 'url' => ['view', 'id' => $model->group_user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mwebgroup-update">

    <?= $this->render('_form', [
        'model' => $model,
        'used'=>$used
    ]) ?>

</div>
