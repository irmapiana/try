<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Trewmutation */

$this->title = 'Tambah Detil Poin';
$this->params['breadcrumbs'][] = ['label' => 'Trewmutations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trewmutation-create">
  <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
