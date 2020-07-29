<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MMenucfg */

$this->title = 'Ubah Menu: ';
$this->params['breadcrumbs'][] = ['label' => 'Mmenucfgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->menucode, 'url' => ['view', 'id' => $model->menucode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mmenucfg-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
