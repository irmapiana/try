<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Request;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\models\Museraccount;
use app\models\Mproduct;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\components\PTotal;

$this->title = 'Detil Transaksi';
// $this->params['breadcrumbs'][] = $this->title;
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
 echo $form->field($model, 'accountno')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Museraccount::find()->all(), 'accountno', 'concat'),
            'language' => 'id',
            'options' => ['placeholder' => 'Masukkan Merchant Name'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label("Merchant");
echo '</td>';

echo '<td> &nbsp&nbsp&nbsp&nbsp</td>';
echo '<td>';
$dropdown_product['-0-'] = "Semua Produk";
$dropdown_product = array_merge($dropdown_product, ArrayHelper::map(Mproduct::find()->all(), 'productid', 'product_name'));
echo $form->field($model, 'productid')->widget(Select2::classname(), [
            'data' => $dropdown_product,
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Produk..'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label("Produk");
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
            [
                'label' => 'Merchant',
                'attribute' => 'accountno',
            ],
            [
                'label' => 'TANGGAL',
                'attribute' => 'timestamp',
                'value' => function ($data) {
                    // Tipe datanya: timestamp
                    return str_replace('.', ':', substr($data['timestamp'], 0, 18));
                }
            ],
            [
                'label' => 'ITEM',
                'attribute' => 'data11',
            ],
            [
                'label' => 'NO IDENTITAS',
                'attribute' => 'data1',
            ],
            [
                'label' => 'REFERENSI',
                'attribute' => 'data2',
            ],
            [
                'label' => 'NOB',
                'attribute' => 'data10',
            ],
            [
                'label' => 'HARGA',
                'attribute' => 'data8',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['data8']);
                },
            ],
            [
                'label' => 'ADMIN',
                'attribute' => 'data9',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['data9']);
                },
            ],
            [
                'label' => 'KOMISI',
                'attribute' => 'selling_fee',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['selling_fee']);
                },
            ],
            [
                'label' => 'TOTAL',
                'attribute' => 'total',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['total']);
                },
            ],
        ],
    ]); ?>
</div>
