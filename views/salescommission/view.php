<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Msalescommission */

$this->title = $model->SCOMMISSIONID;
$this->params['breadcrumbs'][] = ['label' => 'Msalescommissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="msalescommission-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->SCOMMISSIONID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->SCOMMISSIONID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
         <?= Html::a('Kembali', ['index'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'SCOMMISSIONID',
            'spriceid',
            'productid',
            'itemid',
            'SCOMMISSION_0',
            'SCOMMISSION_1',
            'SCOMMISSION_2',
            'SCOMMISSION_VALIDFROM',
            'SCOMMISSION_VALIDUNTIL',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
