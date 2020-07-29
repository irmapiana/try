<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Mregrpoint */

$this->title = $model->mobileid;
$this->params['breadcrumbs'][] = ['label' => 'Mmobiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmobile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->mobileid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->mobileid], [
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
            'mobileid',
            'mobilepin',
            'mobileno',
            'deviceid',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
