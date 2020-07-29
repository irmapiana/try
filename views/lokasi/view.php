<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Inflokasi */

$this->title = $model->LOKASI_ID;
$this->params['breadcrumbs'][] = ['label' => 'Inflokasis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inflokasi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->LOKASI_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->LOKASI_ID], [
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
            'LOKASI_ID',
            'LOKASI_KODE',
            'LOKASI_NAMA',
            'LOKASI_PROPINSI',
            'LOKASI_KABUPATENKOTA',
            'LOKASI_KECAMATAN',
            'LOKASI_KELURAHAN',
        ],
    ]) ?>

</div>
