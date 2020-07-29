<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Morg */

$this->title = $model->ORGID;
$this->params['breadcrumbs'][] = ['label' => 'Morgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="morg-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ORGID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ORGID], [
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
            'ISOBIT',
            'ISOVALUE',
            'ADDRESS',
            'PIC',
            'EMAIL:email',
            'TLP',
            'BALANCE',
            'CHECKLIMIT',
            'cby',
            'cdate',
            'mby',
            'mdate',
            'ORGNAME',
            'ORGID',
            'ITEXT',
            'PRINT',
            'PARENT_ORGID',
            'ISDEALER',
        ],
    ]) ?>

</div>
