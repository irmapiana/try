<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Msalesreward */

$this->title = 'Tambah Reward';
$this->params['breadcrumbs'][] = ['label' => 'Msalesrewards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msalesreward-create">


    <?= $this->render('_form', [
        'model' => $model,
        'from' => isset($from) ? $from : null,
    ]) ?>

</div>
