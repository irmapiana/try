<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\broadcast */

$this->title = 'Ubah Resource: ' . $model->resourceid;
$this->params['breadcrumbs'][] = ['label' => 'Mresources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->resourceid, 'url' => ['view', 'id' => $model->resourceid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mresource-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
            ]) ?>

</div>
