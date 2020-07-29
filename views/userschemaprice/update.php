<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mschema */

$this->title = 'Update Muserschemaprice: ' . $model->userid;
$this->params['breadcrumbs'][] = ['label' => 'Muserschemaprices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->userid, 'url' => ['view', 'id' => $model->userid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="muserschemaprice-update">

   <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
