<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Request;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Morg;

$this->title = 'Saldo Jaringan';
$this->params['breadcrumbs'][] = $this->title;


use app\assets\AppAsset;
AppAsset::register($this);
?>
<div>
    <?php $form = ActiveForm::begin([
    'action' => ['searchresults'],
    'method' => 'get',
    'id' => 'searchForm'
]); 
 echo $form->field($model, 'orgid')->widget(Select2::classname(), [
            'data' =>  Morg::getList(),
            'language' => 'id',
            'options' => ['placeholder' => 'Masukkan Kode Agen/Dealer..'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label("Kode Agen/Dealer");
?>
    <div class="form-group">
        <?php echo Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
    </div>        
<?php ActiveForm::end(); ?>
    <?php GridView::widget([
        'dataProvider' => $dataProvider,
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ""],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'AKUN',
                'attribute' => 'ORGID',
            ],
            [
                'label' => 'NAMA',
                'attribute' => 'ORGNAME',
            ],
            [
                'label' => 'LEVEL',
                'attribute' => 'LVL',
                'contentOptions' => ['style' => 'width:50px;text-align: center;'],
            ],
            [
                'label' => 'SALDO',
                'attribute' => 'BALANCE',
                'contentOptions' => ['style' => 'text-align: right;'],
                'value' => function ($data) {
                    return number_format($data['BALANCE']);
                },
                'format'=>'raw',
            ],

        ],
    ]); ?>
</div>
    
    <?php
    //         $js = '
    // $("#html").jstree();
    // ';
    // $this->registerJs($js);
    ?>

    <h4>Saldo Jaringan</h4>
    <ul id="browser" class="filetree">
        <?php
            $lvl = 1;
            foreach ($dataProvider->getModels() as $key => $value) {

                    $format_indonesia = number_format ($value['BALANCE'], 2, ',', '.');
                    $rp = "[Saldo Rp. ".$format_indonesia."]";
                    $poin = "[Poin ".number_format ($value['POIN'], 0, ',', '.')."]";
                    $item = $value['ORGID'].' - '.$value['ORGNAME'].' - '.$rp.' - '.$poin.' - '.'['.$value['LVL'].']';

                if($value['LVL'] == "1" && $value['LVL'] == $lvl){

                    ?>
                    <li><span class="file"><?= $item ?></span><ul>
                    <?php
                }
                else if($value['LVL'] == "2" && $lvl == 1){

                    ?>
                    <li><span class="file"><?= $item ?></span>
                    <?php
                    $lvl = 2;
                } 
                else if($value['LVL'] == "2" && $lvl == 2){
                    ?>
                    <li><span class="file"><?= $item ?></span>
                    <?php
                }
                else if($value['LVL'] == "3" && $lvl == 2){

                    ?>
                        <ul><li><span class="file"><?= $item ?></span>
                    <?php
                    $lvl = 3;
                }
                else if($value['LVL'] == "3" && $lvl == 3){
                    ?>
                    </li><li><span class="file"><?= $item ?></span>
                    <?php
                }
                else if($value['LVL'] == "4" && $lvl == 3){

                    ?>
                    <ul><li><span class="file"><?= $item ?></span>
                    <?php
                    $lvl = 4;
                }
                else if($value['LVL'] == "4" && $lvl == 4){
                    ?>
                    </li><li><span class="file"><?= $item ?></span>
                    <?php
                }
                else if($value['LVL'] == "3" && $lvl == 4){

                    ?>
                    </ul></li><li><span class="file"><?= $item ?></span>
                    <?php
                    $lvl = 3;
                } 
                else if($value['LVL'] == "2" && $lvl == 3){

                    ?>
                    </ul></li><li><span class="file"><?= $item ?></span>
                    <?php
                    $lvl = 2;
                } 
            }
        ?>
            </ul>
        </li>
    </ul>