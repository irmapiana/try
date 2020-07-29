<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mspriceadmin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Madminandfees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="madminandfee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'spriceid',
            'productid',
            'itemid',
            'ks_fee',
            'valid_from',
            'valid_until',
            'admin',
            'fix_admin',
            'merchant_fee',
            'fix_merchant_fee',
        ],
    ]) ?>

</div>
