<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Mschema */

$this->title = $model->userid;
$this->params['breadcrumbs'][] = ['label' => 'Muserschemaprice', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muserschemaprice-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'userid' => $model->userid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'userid' => $model->userid], [
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
            'spriceid',
            'userid',
            'cby',
            'cdate',
            'mby',
            'mdate',
        ],
    ]) ?>

</div>
