<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Update Product Menu: ' . $model->group_menuid;
$this->params['breadcrumbs'][] = ['label' => 'Productmenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group_menuid, 'url' => ['view', 'id' => $model->group_menuid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productmenu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
