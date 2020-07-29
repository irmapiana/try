<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\Models\TfrontSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Mitra';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tfront-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <section class="tfront-index", style="margin-right: 1100px; background-color: #fff; background-size: -50px;" onclick="showSettingDropdown()">
                <p style="font-size: 20px; font-style: bold;">
         <?= Html::a('Tambah Transaksi Mitra', ['create'], ['class="tfront-index"'],['class' => 'btn btn-success btn-create']) ?>
         </p>
         </section>

    <div id="musrenbang" style="overflow: auto;overflow-y: hidden;overflow-x: auto;">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'BANKCODE',
                'MERCHANTID',
                'TERMINALID',
                'BATCHNUMBER',
                'SETTFLAG',
                [
                'attribute' => 'SETTDATE',
                'format' => ['date', 'php:d-m-Y']
                ],
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
                // 'cby',
                // 'cdate',
                // 'mby',
                // 'mdate',
                'PID',
                'ORGID',
                'SCHEMAID',
                'itemid',
                'productid',
                'FOOTPRINT',
                'noteS',
                'FRONT_TRXID',
                'PRINT',
                [
                'attribute' => 'TDATE',
                'format' => ['date', 'php:d-m-Y']
                ],
                'BACK_SCHEMAID',
                'sch_updatedD',
                'BACK_sch_updatedD',
                'DATA31',
                'COMMISSION',
                'POINT',

                ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}'],
            ],
        ]); ?>
    </div>
</div>
