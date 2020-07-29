<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Maccount */

$this->title = $model->account_name;
$this->params['breadcrumbs'][] = ['label' => 'Maccounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maccount-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->userid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->userid], [
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
            'userid',
            'account_name',
            'bbalance',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
