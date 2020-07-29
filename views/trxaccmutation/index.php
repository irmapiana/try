<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Request;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\components\PTotal;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Mproduct;
use app\models\Morg;

$this->title = 'Mutasi Akun';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <?php $form = ActiveForm::begin([
    'action' => ['searchresults'],
    'method' => 'get',
    'id' => 'searchForm'
]); 
echo '<table>';
echo '<tr>';
echo '<td>';
echo $form->field($model, 'orgid')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Morg::find()->all(), 'ORGID', 'concat'),
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
        'showFooter'=>TRUE,
        'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;text-align: right;'],
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],
            [
                'label' => 'AKUN',
                'attribute' => 'AKUN',
            ],
            [
                'label' => 'TANGGAL',
                'attribute' => 'TANGGAL',
            ],
            [
                'label' => 'TRANSAKSI',
                'attribute' => 'TRANSAKSI',
            ],
            [
                'label' => 'SALDO AWAL',
                'attribute' => 'SALDO_AWAL',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['SALDO_AWAL']);
                },
                'format'=>'raw',
            ],
            [
                'label' => 'SALDO AKHIR',
                'attribute' => 'SALDO_AKHIR',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['SALDO_AKHIR']);
                },
                'format'=>'raw',
            ],
            [
                'label' => 'JUMLAH',
                'attribute' => 'AMOUNT',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                     return PTotal::formatRupiah($data['AMOUNT']);
                },
                'format'=>'raw',
            ],
        ],
    ]); ?>
</div>
