<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\web\Request;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\models\Museraccount;
use app\models\Mproduct;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\components\PTotal;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

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
    'value' => date('Y-m-d', strtotime('+2 days')),
    'options' => ['placeholder' => 'Pilih rentang awal tanggal..'],
    'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'autoclose' => true,
        'todayHighlight' => true
    ]
])->label("Tanggal Awal");
echo '</td>';

echo '<td> &nbsp&nbsp&nbsp&nbsp</td>';
echo '<td>';
echo $form->field($model, 'enddate')->widget(DatePicker::classname(), [
    'value' => date('Y-m-d', strtotime('+2 days')),
    'options' => ['placeholder' => 'Pilih rentang akhir tanggal..'],
    'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
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
<?php ActiveForm::end();?>
<?php $gridColumns = [
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '5%',
    ],
            [
                'label' => 'Merchant',
                'attribute' => 'account_name',
            ],
            [
                'label' => 'TANGGAL',
                'attribute' => 'tdate',
                /*'value' => function ($data) {
                    // Tipe datanya: timestamp
                    return str_replace('.', ':', substr($data['tdate'], 0, 18));
                }*/
            ],
            [
                'label' => 'PRODUCT',
                'attribute' => 'productid',
                'footer' => '',
            ],
            [
                'label' => 'ITEM',
                'attribute' => 'itemid',
            ],
            [
                'label' => 'SUBSRIBER ID',
                'attribute' => 'subscriber_id',
            ],
            [
                'label' => 'NO REF',
                'attribute' => 'rrn',
            ],
            [
                'label' => 'AMOUNT',
                'attribute' => 'amount',
                /*'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return PTotal::formatRupiah($data['amount']);
                },*/
            ],
    ];
    echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'dropdownOptions' => [
        'label' => 'Export All',
        'class' => 'btn btn-secondary'      
    ],
    'exportConfig' => [
        ExportMenu::FORMAT_PDF => false,
    ],
]) . "<hr>\n".
GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'export' => false,
    ]);
    ?>
</div>
