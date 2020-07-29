<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */

$this->title = $model->front_trxid;
$this->params['breadcrumbs'][] = ['label' => 'tfront', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tfront-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->front_trxid], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'front_trxid',
            'enc_subscriber_id',
            'subscriber_name',
            'userid',
            'accountno',
            'productid',
            'itemid',
            'tdate',
            'amount',
            'admin_fee',
            'purchase_price',
            'selling_fee',
            'sell_price',
            'rc',
            'settlflag',
        ],
    ]) ?>

</div>
