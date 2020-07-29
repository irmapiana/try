<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Mwebgroup */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
if(!$model->isNewRecord){
    $js = '
    $("body").on("beforeSubmit", "form#mwebgroup-form", function () {
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
        $("#mwebgroup-form").submit();
    });
    ';
    $this->registerJs($js);
    $button = Html::button('Batal', ['class' => 'btn btn-danger btn-md', 'data' => ['dismiss' => "modal"]]);
    $button .= Html::button('Ubah', ['id' => 'submit', 'class' => 'btn btn-primary success btn-md']);
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

<div class="mwebgroup-form">

    <?php  $form = ActiveForm::begin(['id' => 'mwebgroup-form']); ?>

    <?= $form->field($model, 'group_user')->textInput(['maxlength' => true, 'disabled' => isset($used) ? $used : false]) ?>

    <?= $form->field($model, 'gusername')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger']) ?>
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


</div>
