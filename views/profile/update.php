<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Muser */

$this->title = 'Ubah Pengguna: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'userid' => $model->userid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-update">

  <?php ?>

    <?= $this->render('_form', [
        'model' => $model,
        //'groups' => $groups,
      //  'dealers' => $dealers,
    ]) ?>

</div>
