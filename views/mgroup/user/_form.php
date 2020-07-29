<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use kartik\switchinput\SwitchInput;
use yii\bootstrap\Modal;
use app\models\Mwebgroup;

/* @var $this yii\web\View */
/* @var $model app\Models\Muser */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$script = <<< JS
$(document).ready(function(){
    $("#loading2").hide();
    $(document).ready(function() {
        $("#muser-province").on('change', function() {
            var prov = $(this).val();
            if(prov) {
                $.ajax({
                    url: 'kabupaten?id='+prov,
                    type: "GET",
                    beforeSend: function(){
                        $("#loading2").show();
                    },
                    success:function(data) {
                        $("#loading2").hide();
                        $("#muser-city").html(data);
                    }
                });
            }else{
                $("#muser-city").empty();
            }
        });
    });
});

$(document).ready(function(){
    $("#loading2").hide();
    $(document).ready(function() {
        $("#muser-city").on('change', function() {
            var city = $(this).val();
            var prov = $("#muser-province").val();
            if(city) {
                $.ajax({
                    url: 'kecamatan?cityid='+city+'&provid='+prov,
                    type: "GET",
                    beforeSend: function(){
                        $("#loading2").show();
                    },
                    success:function(data) {
                        $("#loading2").hide();
                        $("#muser-kecamatan").html(data);
                    }
                });
            }else{
                $("#muser-kecamatan").empty();
            }
        });
    });
});

$(document).ready(function(){
    $("#loading2").hide();
    $(document).ready(function() {
        $("#muser-kecamatan").on('change', function() {
            var kecamatan = $(this).val();
            var city = $("#muser-city").val();
            var prov = $("#muser-province").val();
            if(kecamatan) {
                $.ajax({
                    url: 'kelurahan?kecid='+kecamatan+'&cityid='+city+'&provid='+prov,
                    type: "GET",
                    beforeSend: function(){
                        $("#loading2").show();
                    },
                    success:function(data) {
                        $("#loading2").hide();
                        $("#muser-kelurahan").html(data);
                    }
                });
            }else{
                $("#muser-kelurahan").empty();
            }
        });
    });
});

JS;
$this->registerJs($script, \yii\web\View::POS_END);
?>
<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#muser-form", function () {
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
        $("#muser-form").submit();
    });
    ';
    $this->registerJs($js);
    $button = Html::button('Ubah', ['id' => 'submit', 'class' => 'btn btn-primary success btn-md']);
    $button .= Html::button('Batal', ['class' => 'btn btn-danger btn-md', 'data' => ['dismiss' => "modal"]]);
    
    Modal::begin([
        'header' => '<h4>Konfirmasi</h4>',
        'toggleButton' => false,
        'id' => 'confirm-submit',
        'footer' => $button
    ]);
        echo 'Apakah Yakin Ingin Mengubah?';
    Modal::end();
}
?>
<div class="muser-form">

    <?php $form = ActiveForm::begin(['id' => 'muser-form']); ?>

    <?= $form->field($model, 'userid')->textInput(['maxlength' => true, 'disabled' => !$model->isNewRecord]) ?>

    <?php if (!$model->isNewRecord) { ?>
        <strong><i> Biarkan kosong jika tidak ingin mengubah password</i></strong>
    <?php } ?>

    <?= $form->field($model, 'new_password')->passwordInput(['maxlength' => true]) ?> 

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Nama']) ?>


    <?= $form->field($model, 'group_user')->textInput(['maxlength' => true]) ?>

    <?=
        $form->field($model, 'webgroup_user')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Mwebgroup::find()->all(), 'group_user', 'gusername'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Web Group..'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'mobileno')->textInput(['maxlength' => true, 'placeholder' => 'Nomor Telepon']) ?>

    <?=
    $form->field($model, 'status_user')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'onText' => 'active',
            'offText' => 'Banned',
        ]
    ])
    ?>
    
    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
<div id="loading2" style="float:left;
     top:200px;
     left:800px;
     position:fixed;
     padding:10px 1.5%;
     height: 0px;">
    <img src="<?php echo Yii::getAlias('@web') ?>/img/loading.gif" width="150" height="150" />
</div>
