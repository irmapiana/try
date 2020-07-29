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
use app\models\Museraccount;

$this->title = 'Rekap Transaksi';
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
 echo $form->field($model, 'accountno')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Museraccount::find()->all(), 'accountno', 'concat'),
            'language' => 'id',
            'options' => ['placeholder' => 'Merchant Name'],
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
        'showFooter'=>TRUE,
        'footerRowOptions'=>['style'=>'font-weight:bold;text-decoration: underline;text-align: right;'],
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
            ],
            [
                'label' => 'Merchant',
                'attribute' => 'accountno',
                'footer' => ''
            ],
            [
                'label' => 'PRODUK',
                'attribute' => 'product_name',
                'footer' => '',
            ],
            [
                'label' => 'TRANSAKSI',
                'attribute' => 'sum_trx',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['sum_trx']);
                },
                'format'=>'raw',
                'footer'=>PTotal::pageTotal($dataProviderWithNoPaging->models,'sum_trx',1),
            ],
            [
                'label' => 'HARGA',
                'attribute' => 'sum_amount',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['sum_amount']);
                },
                'format'=>'raw',
                'footer'=>PTotal::pageTotal($dataProviderWithNoPaging->models,'sum_amount',1),
            ],
            [
                'label' => 'ADMIN',
                'attribute' => 'sum_admin_fee',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                 return PTotal::formatRupiah($data['sum_admin_fee']);
                    
                },
                'format'=>'raw',
                'footer'=>PTotal::pageTotal($dataProviderWithNoPaging->models,'sum_admin_fee',1),
            ],
            [
                'label' => 'KOMISI',
                'attribute' => 'sum_selling_fee',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['sum_selling_fee']);
                },
                'format'=>'raw',
                'footer'=>PTotal::pageTotal($dataProviderWithNoPaging->models,'sum_selling_fee',1),
            ],
            [
                'label' => 'TOTAL',
                'attribute' => 'total',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['total']);
                },
                'format'=>'raw',
                'footer'=>PTotal::pageTotal($dataProviderWithNoPaging->models,'total',1),
            ],
        ],
    ]); ?>
</div>
