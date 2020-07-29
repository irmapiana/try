<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Tambah Group Menu Item';
$this->params['breadcrumbs'][] = ['label' => 'mgroupmenuitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mgroupmenuitem-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
