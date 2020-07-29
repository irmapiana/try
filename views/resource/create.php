<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usersession */

$this->title = 'Tambah Resource';
$this->params['breadcrumbs'][] = ['label' => 'Mresource', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mresource-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
