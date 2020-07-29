<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = 'Ubah Group Menu: ' . $model->group_menuid;
$this->params['breadcrumbs'][] = ['label' => 'Mgroupmenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->group_menuid, 'url' => ['view', 'id' => $model->group_menuid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="groupmenu-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
        'used' => $used,
    ]) ?>

</div>
