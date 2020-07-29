<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\Models\Mschema */

$this->title = $model->schemaid;
$this->params['breadcrumbs'][] = ['label' => 'Mschema', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mschema-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'schemaid' => $model->schemaid, 'sch_updated' => $model->sch_updated], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'schemaid' => $model->schemaid, 'sch_updated' => $model->sch_updated], [
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
            'productid',
            'itemid',
            'schemaid',
            'cby',
            'cdate',
            'mby',
            'mdate',
            'classname',
            'itype',
            'ca_adminfee',
            'fix_ca_adminfee',
            'cashbackid',
            'minus_factor',
            'plus_factor',
            'invoice_method',
            'ppn',
            'bankcode',
            'orgid',
            'active',
            'converter',
            'destinationid',
            'recon_code',
            'pid',
            'accountno',
            'cid',
            'multiply_factor',
            'feebase',
            'updated',
            'sch_updated',
            'calendarid',
            'admininclude',
            'input1',
            'input2',
            'input3',
            'input4',
            'spriceid',
            'ppriceid',
        ],
    ]) ?>

</div>
