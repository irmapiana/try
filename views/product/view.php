<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */

$this->title = $model->productid;
$this->params['breadcrumbs'][] = ['label' => 'Mproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mproduct-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->productid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->productid], [
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
            'productid',
            'note',
            'cby',
            'cdate',
            'mby',
            'mdate',
            'product_name',
            'active',
        ],
    ]) ?>

</div>
