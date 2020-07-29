<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = $model->group_menuid;
$this->params['breadcrumbs'][] = ['label' => 'productmenu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productmenu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->group_menuid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->group_menuid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'group_menuid',
            'itemid',
            'item_seq',
            'next_class',
            'active',
            
        ],
    ]) ?>

</div>
