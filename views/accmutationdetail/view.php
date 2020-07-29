<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Taccmutationdetails */

$this->title = $model->MUTATION_ID;
$this->params['breadcrumbs'][] = ['label' => 'Taccmutationdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taccmutationdetails-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->MUTATION_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->MUTATION_ID], [
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
            'MUTATION_ID',
            'BANK_ACCOUNT_ID',
            'MUTATION_STATUS_CODE',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
