<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Request;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use app\models\Morg;

$this->title = 'Transaksi Jaringan';
$this->params['breadcrumbs'][] = $this->title;


?>
<div>
    <?php $form = ActiveForm::begin([
        'action' => ['searchresults'],
        'method' => 'get',
        'id' => 'searchForm'
    ]);

    echo "<table>";
    echo '<tr>';
    echo '<td>';
    echo $form->field($model, 'orgid')->widget(Select2::classname(), [
        'data' => Morg::getList(),
        'language' => 'id',
        'options' => ['placeholder' => 'Masukkan Kode Agen/Dealer..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label("Kode Agen/Dealer");
    echo '</td>';


    echo '<td> &nbsp&nbsp&nbsp&nbsp</td>';
    echo '<td>';
    echo $form->field($model, 'startdate')->widget(DatePicker::classname(), [
        'value' => date('d-M-Y', strtotime('+2 days')),
        'options' => ['placeholder' => 'Pilih rentang awal tanggal..'],
        'pluginOptions' => [
            'format' => 'dd-M-yyyy',
            'autoclose' => true,
            'todayHighlight' => true
        ]
    ])->label("Tanggal Awal");
    echo '</td>';


    echo '<td> &nbsp&nbsp&nbsp&nbsp</td>';
    echo '<td>';
    echo $form->field($model, 'enddate')->widget(DatePicker::classname(), [
        'value' => date('d-M-Y', strtotime('+2 days')),
        'options' => ['placeholder' => 'Pilih rentang akhir tanggal..'],
        'pluginOptions' => [
            'format' => 'dd-M-yyyy',
            'autoclose' => true,
            'todayHighlight' => true
        ]
    ])->label("Tanggal Akhir");
    echo '</td>';
    ?>
    </table>
    <div class="form-group">
        <?php echo Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            /* [
                 'label' => 'TANGGAL',
                 'attribute' => 'cdate',
             ],*/
            [
                'label' => 'DEALER',
                'attribute' => 'ORGNAME',
            ],
            /*[
                'label' => 'LEVEL',
                'attribute' => 'LVL',
            ],*/
            [
                'label' => 'KODE DEALER',
                'attribute' => 'ORGID',
            ],
            /* [
                 'label' => 'REKRUT OLEH',
                 'attribute' => 'PARENT_ORGNAME',
             ],*/
            /*[
                'label' => 'KODE',
                'attribute' => 'PARENT_ORGID',
            ],*/

            /*[
                'label' => 'TRX LVL 1',
                'attribute' => 'TOTAL',

            ],*/

            [
                'label' => 'JML TRX1',

                'value' => function ($data) {
                    if(Morg::getTrxLevelSatuTotal($data['ORGID']) != '')
                    {
                        return Morg::getTrxLevelSatuTotal($data['ORGID']);
                    }
                    else
                    {
                        return 0;
                    }


                },


            ],

            [
                'label' => 'JML LVL2',
                //'value' => 'ORGID',
                'value' => function ($data) {
                    if(Morg::getLevelDuaTotal($data['ORGID']) != '')
                    {
                        return Morg::getLevelDuaTotal($data['ORGID']);
                    }
                    else
                    {
                        return 0;
                    }
                },
            ],

            [
                'label' => 'TRX LVL2',
                'value' => function ($data) {
                    if(Morg::getTrxLevelDuaTotal($data['ORGID']) != '')
                    {
                        return Morg::getTrxLevelDuaTotal($data['ORGID']);
                    }
                    else
                    {
                        return 0;
                    }
                },


            ],
        ],


    ]); ?>
</div>
