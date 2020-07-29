<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MMenucfg */

$this->title = 'Tambah Menu';
$this->params['breadcrumbs'][] = ['label' => 'Mmenucfgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmenucfg-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
