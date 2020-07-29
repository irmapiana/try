<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trewmutation */

$this->title = 'Ubah Detil Poin';
$this->params['breadcrumbs'][] = ['label' => 'Trewmutations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reward_mutationid, 'url' => ['view', 'id' => $model->reward_mutationid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trewmutation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
