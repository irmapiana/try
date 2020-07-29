<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Request;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Morg;

$this->title = 'Organisasi Jaringan';
$this->params['breadcrumbs'][] = $this->title;

use app\assets\AppAsset;
AppAsset::register($this);

// echo "<pre>";
// foreach ($dataProvider->getModels() as $key => $value) {
//     echo json_encode($value);
// }
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
                'label' => 'LEVEL',
                'attribute' => 'LVL',
                'contentOptions' => ['style' => 'width:50px;text-align: center;'],
            ],
            [
                'label' => 'AKUN',
                'attribute' => 'ORGID',
                'value' => function($model) {
                    if ($model["LVL"]==2) {
                        return "|____ ".$model["ORGID"];
                    }else if ($model["LVL"]==3) {
                        return "|______________ ".$model["ORGID"];
                    }else if ($model["LVL"]==4) {
                        return "|________________________ ".$model["ORGID"];
                    }else{
                        return $model["ORGID"];
                    }
                },
            ],
            [
                'label' => 'NAMA',
                'attribute' => 'ORGNAME',
                'value' => function($model) {
                    if ($model["LVL"]==2) {
                        return "|____ ".$model["ORGNAME"];
                    }else if ($model["LVL"]==3) {
                        return "|______________ ".$model["ORGNAME"];
                    }else if ($model["LVL"]==4) {
                        return "|________________________ ".$model["ORGNAME"];
                    }else{
                        return $model["ORGNAME"];
                    }
                },
            ],
            [
                'label' => 'EMAIL',
                'attribute' => 'EMAIL',
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

    <h4>View Jaringan</h4>
    <ul id="browser" class="filetree">
        <?php
            $lvl = 1;
            foreach ($dataProvider->getModels() as $key => $value) {
                if($value['LVL'] == "1" && $value['LVL'] == $lvl){
                    ?>
                    <li><span class="file"><?= $value['ORGID'].' - '.$value['ORGNAME'].' - '.'['.$value['LVL'].']'?></span><ul>
                    <?php
                }
                else if($value['LVL'] == "2" && $lvl == 1){
                    ?>
                    <li><span class="file"><?= $value['ORGID'].' - '.$value['ORGNAME'].' - '.'['.$value['LVL'].']'?></span>
                    <?php
                    $lvl = 2;
                } 
                else if($value['LVL'] == "2" && $lvl == 2){
                    ?>
                    <li><span class="file"><?= $value['ORGID'].' - '.$value['ORGNAME'].' - '.'['.$value['LVL'].']'?></span>
                    <?php
                }
                else if($value['LVL'] == "3" && $lvl == 2){
                    ?>
                        <ul><li><span class="file"><?= $value['ORGID'].' - '.$value['ORGNAME'].' - '.'['.$value['LVL'].']'?></span>
                    <?php
                    $lvl = 3;
                }
                else if($value['LVL'] == "3" && $lvl == 3){
                    ?>
                    </li><li><span class="file"><?= $value['ORGID'].' - '.$value['ORGNAME'].' - '.'['.$value['LVL'].']'?></span>
                    <?php
                }
                else if($value['LVL'] == "4" && $lvl == 3){
                    ?>
                    <ul><li><span class="file"><?= $value['ORGID'].' - '.$value['ORGNAME'].' - '.'['.$value['LVL'].']'?></span>
                    <?php
                    $lvl = 4;
                }
                else if($value['LVL'] == "4" && $lvl == 4){
                    ?>
                    </li><li><span class="file"><?= $value['ORGID'].' - '.$value['ORGNAME'].' - '.'['.$value['LVL'].']'?></span>
                    <?php
                }
                else if($value['LVL'] == "3" && $lvl == 4){
                    ?>
                    </ul></li><li><span class="file"><?= $value['ORGID'].' - '.$value['ORGNAME'].' - '.'['.$value['LVL'].']'?></span>
                    <?php
                    $lvl = 3;
                } 
                else if($value['LVL'] == "2" && $lvl == 3){
                    ?>
                    </ul></li><li><span class="file"><?= $value['ORGID'].' - '.$value['ORGNAME'].' - '.'['.$value['LVL'].']'?></span>
                    <?php
                    $lvl = 2;
                } 
            }
        ?>
            </ul>
        </li>
    </ul>