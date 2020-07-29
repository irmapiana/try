<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Maccount;
use app\models\Mbankaccount;
use app\models\Mmutationtype;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use yii\bootstrap\Modal;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Taccmutationtmp */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#taccmutationtmp-form", function () {
        var form = $(this);     
        if (form.find(".has-error").length) {
            return false;
        }
        else {
            if($("#confirm-submit").hasClass("in")) {
                return true;
            }
            else {
                $("#confirm-submit").modal("show");
            }
        }    
        return false;
    });
    $("#submit").click(function(){
        $("#taccmutationtmp-form").submit();
    });
    ';
    $this->registerJs($js);
    $button = Html::button('Batal', ['class' => 'btn btn-danger btn-md', 'data' => ['dismiss' => "modal"]]);
    $button .= Html::button('Ubah/Approve', ['id' => 'submit', 'class' => 'btn btn-primary success btn-md']);
    Modal::begin([
        'header' => '<h4>Konfirmasi</h4>',
        'toggleButton' => false,
        'id' => 'confirm-submit',
        'footer' => $button
    ]);
        echo 'Apakah Yakin Ingin Mengubah/Approve?';
    Modal::end();
}

$script = <<< JS
$(document).ready(function(){
    $( "#taccmutationtmp-mtype" ).change(function(e) {
        var catatan = $("#taccmutationtmp-notes");
        var type = $("#taccmutationtmp-mtype").val();
        $.ajax({
            url: "getnotes?id="+type,
            type: 'POST',
            success: function (res) {
                $("#taccmutationtmp-notes").val(res);
            }
        });
        
    });
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);
?>

<div class="taccmutationtmp-form">



    <?php 
        $form = ActiveForm::begin(['id' => 'taccmutationtmp-form','method'=>'post']);
        $jumlah = $form->field($model, 'AMOUNT');
    ?>  
    
    <?= $form->field($model, 'MUTATIONID')->textInput(['maxlength' => true, 'disabled' => !$model->isNewRecord]) ?>

    <?=
        $form->field($model, 'userid')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Maccount::find()->all(), 'userid', 'concat'),
            'language' => 'id',
            'disabled' => !$model->isNewRecord,
            'options' => ['placeholder' => 'Pilih Akun..'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

     <?php
     
        
        echo $form->field($model, 'BANKCODE')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Mbankaccount::find()->all(), 'BANK_CODE', 'BANK_NAME'),
            'language' => 'id',
             // 'disabled' => !$model->isNewRecord,
            'options' => ['placeholder' => 'Pilih Bank..'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        
    ?>

    <?php
        echo "<div style='width:300px'>";
        echo $form->field($model, 'BDATE')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Pilih Tanggal Bank...'],
                     'value' => 'yyyy-mm-dd',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd',
                          'todayHighlight' => TRUE,
            ]
        ]);
        echo "</div>";
    ?>

    <?=
        $form->field($model, 'MTYPE')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Mmutationtype::find()->all(), 'MTYPE', 'MNAME'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Tipe..'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?php $form->field($model, 'AMOUNT')->textInput(['maxlength' => true]) ?>

    <?php
        echo $form->field($model, 'AMOUNT')->widget(MaskMoney::classname(), [
            'pluginOptions' => [
                'prefix' => 'Rp. ',
                'affixesStay' => true,
                'thousands' => '.',
                'decimal' => ',',
                'precision' => 0,
                'allowZero' => false,
                'allowNegative' => false,
            ]
        ]);
    ?>
    
     

    <?= $form->field($model, 'noteS')->textInput(['maxlength' => true]) ?>


    <?php
        if($model->isNewRecord)
        {
            echo $form->field($model, 'ISDIRECT')->dropDownList(['1' => 'DIRECT', '2' => 'NOT DIRECT'],['prompt'=>'--',  'disabled' => !$model->isNewRecord]);
        }
    
    ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['name' => 'submits','value' => 'update','class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary update']) ?>
        <?php
            if(!$model->isNewRecord){
                ?>
                    <?= Html::submitButton('Approve', ['name' => 'submits','value' => 'approve','class' => 'btn btn-success approve']) ?>
                <?php
            }
        ?>
        
        <?php 
            
            if(!$model->isNewRecord)
            {
               // echo  Html::a('Approve', ['approve','id'=>$model->MUTATIONID], [
               //                          'title' => Yii::t('app', 'Approve'),
               //                          'class' => 'btn btn-success',
               //                          'data' => [
               //                              'confirm' => Yii::$app->params['approveConfirm'],
               //                              'method' => 'post',
               //                          ]
               //              ]);
                // echo Html::a('Approve', ['approve','id'=>$model->MUTATIONID], [
                //     'title' => Yii::t('app', 'Approve'),
                //     'class'       => 'btn btn-success popup-modal',
                //     'data-toggle' => 'modal',
                //     'data-target' => '#modal',
                //     'data-id'     => $model->MUTATIONID,
                //     'id'          => 'popupModal',
                // ]);
            }
            ?>
        <?= Html::a('Batal', ['/vaccmutation/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php Modal::begin([
        'header' => '<h4>Konfirmasi</h4>',
        'id'     => 'modal-approve',
        'footer' => Html::a('Approve', '', ['class' => 'btn btn-success', 'id' => 'approve-confirm']),
    ]); ?>

    <?= Yii::$app->params['approveConfirm'] ?>

<?php Modal::end(); ?>
<?php
$this->registerJs("
    $(function() {
        $('.popup-modal').click(function(e) {
            e.preventDefault();
            var modal = $('#modal-approve').modal('show');
            modal.find('.modal-body').load($('.modal-dialog'));
            var that = $(this);
            var id = that.data('id');
            var name = that.data('name');
            // modal.find('.modal-title').text('Supprimer la ressource \"' + name + '\"');

            $('#approve-confirm').click(function(e) {
                e.preventDefault();
                window.location = 'approve?id='+id;
            });
        });
    });"
);
?>

<?php
$this->registerJs('
    $("#accmutationtmp-amount").maskMoney({prefix:"Rp. ", thousands:".", decimal:",", precision:"0", allowNegative: false});
    var input = $("[name=\'' . $jumlah->model->formName() . '[' . $jumlah->attribute . ']' . '\']");
    input.on("change", function () {
        var val = $(this).siblings("input").val();
        val = Number(val.replace(/[^0-9]+/g,""));
        $(this).val(val);
    });

    setTimeout(function(){
        var input = $("[name=\'' . $jumlah->model->formName() . '[' . $jumlah->attribute . ']' . '\']");
        input.siblings("input").val(input.val());
        input.siblings("input").maskMoney("mask");
    },1);
');
?>

</div>
