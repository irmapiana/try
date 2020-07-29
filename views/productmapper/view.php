<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */

$this->title = $model->productid1;
$this->params['breadcrumbs'][] = ['label' => 'Mproductmappers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mproductmapper-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->productid1], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->productid1], [
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
            'productid1',
            'itemid1',
            'productid2',
            'itemid2',
            'info',
            'switch',
            'active',
        ],
    ]) ?>

</div>
