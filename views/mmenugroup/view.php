<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MMenugroup */

$this->title = $model->group_user;
$this->params['breadcrumbs'][] = ['label' => 'Mmenugroups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmenugroup-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'group_user' => $model->group_user, 'menucode' => $model->menucode], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'group_user' => $model->group_user, 'menucode' => $model->menucode], [
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
            'menucode',
            'group_user',
            'cdate',
            'cby',
            'mdate',
            'mby',
        ],
    ]) ?>

</div>
