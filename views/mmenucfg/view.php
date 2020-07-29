<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MMenucfg */

$this->title = $model->menucode;
$this->params['breadcrumbs'][] = ['label' => 'Mmenucfg', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mmenucfg-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->menucode], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->menucode], [
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
            'menuname',
            'menutitle',
            'menulink',
            'menuicon',
            'menuparent',
            'menuorder',
            'status',
            'cdate',
            'cby',
            'mdate',
            'mby',
        ],
    ]) 
    ?>
</div>
