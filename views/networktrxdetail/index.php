<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Request;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Morg;
use app\components\PTotal;
use app\models\Mproduct;

$this->title = 'Detil Transaksi';
// $this->params['breadcrumbs'][] = $this->title;
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
            'data' =>  Morg::getList(),
            'language' => 'id',
            'options' => ['placeholder' => 'Masukkan Kode Agen/Dealer..'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label("Kode Agen/Dealer");
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
                'label' => 'AGEN/DEALER',
                'attribute' => 'ORGID',
            ],
            [
                'label' => 'TANGGAL',
                'attribute' => 'TDATE',
                'value' => function ($data) {
                    // Tipe datanya: timestamp
                    return str_replace('.', ':', substr($data['TDATE'], 0, 18));
                }
            ],

            [
                'label' => 'PRODUK',
                'attribute' => 'productid',
            ],

            [
                'label' => 'ITEM',
                'attribute' => 'DATA11',
            ],
            [
                'label' => 'NO IDENTITAS',
                'attribute' => 'DATA1',
            ],
            [
                'label' => 'REFERENSI',
                'attribute' => 'DATA2',
            ],
            [
                'label' => 'NOB',
                'attribute' => 'DATA10',
            ],
            [
                'label' => 'HARGA',
                'attribute' => 'DATA8',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['DATA8']);
                },
            ],
            [
                'label' => 'ADMIN',
                'attribute' => 'DATA9',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                     return PTotal::formatRupiah($data['DATA9']);
                },
            ],
            [
                'label' => 'KOMISI',
                'attribute' => 'COMMISSION',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['COMMISSION']);
                },
            ],
            [
                'label' => 'TOTAL',
                'attribute' => 'KOMISI',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                        return PTotal::formatRupiah($data['KOMISI']);
                },
            ],
            [
                'label' => 'POIN',
                'attribute' => 'POINT',
                'value' => function ($data) {
                        return PTotal::formatRupiah($data['POINT']);
                },
                'contentOptions' => ['style' => 'text-align: center;'],
            ],
        ],
    ]); ?>
</div>
