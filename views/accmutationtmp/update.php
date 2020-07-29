<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Taccmutationtmp */

$this->title = 'Ubah Persetujuan Akun';
$this->params['breadcrumbs'][] = ['label' => 'Taccmutationtmps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->MUTATIONID, 'url' => ['view', 'id' => $model->MUTATIONID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="taccmutationtmp-update">
    
    <?php 
        $model->BANKCODE = $detail->BANK_ACCOUNT_ID;
    ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
