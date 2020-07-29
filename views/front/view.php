<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Tfront */

$this->title = $model->FRONT_TRXID;
$this->params['breadcrumbs'][] = ['label' => 'Tfronts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tfront-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->FRONT_TRXID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->FRONT_TRXID], [
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
            'BANKCODE',
            'MERCHANTID',
            'TERMINALID',
            'BATCHNUMBER',
            'SETTFLAG',
            'SETTDATE',
            'ISOMSG',
            'RC',
            'DATA1',
            'DATA2',
            'DATA3',
            'DATA4',
            'DATA5',
            'DATA6',
            'DATA7',
            'DATA8',
            'DATA9',
            'DATA10',
            'DATA11',
            'DATA12',
            'DATA13',
            'DATA14',
            'DATA15',
            'DATA16',
            'DATA17',
            'DATA18',
            'DATA19',
            'DATA20',
            'DATA21',
            'DATA22',
            'DATA23',
            'DATA24',
            'DATA25',
            'DATA26',
            'DATA27',
            'DATA28',
            'DATA29',
            'DATA30',
            'cby',
            'cdate',
            'mby',
            'mdate',
            'PID',
            'ORGID',
            'SCHEMAID',
            'itemid',
            'productid',
            'FOOTPRINT',
            'noteS',
            'FRONT_TRXID',
            'PRINT',
            'TDATE',
            'BACK_SCHEMAID',
            'sch_updatedD',
            'BACK_sch_updatedD',
            'DATA31',
            'COMMISSION',
            'POINT',
        ],
    ]) ?>

</div>
