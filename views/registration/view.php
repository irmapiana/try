<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */

$this->title = $model->account_no;
$this->params['breadcrumbs'][] = ['label' => 'Mregistrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="Mregistration-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->$account_no], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->$account_no], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= 
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'account_no',
            'enc_card_number',
            'cby',
            'cdate',
            'mby',
            'mdate',
            'account_name',
            'flag',
            'alamat',
            'propinsi',
            'kota',
            'terminal_id'
        ],
    ]) ?>

</div>
