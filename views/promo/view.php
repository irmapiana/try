<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = $model->promo_seq;
$this->params['breadcrumbs'][] = ['label' => 'promo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->promo_seq], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->promo_seq], [
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
            'promo_seq',
            'url_image',
            'url_content',
            'active',
        ],
    ]) ?>

</div>
