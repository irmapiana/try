<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\MMenugroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mmenugroup-form">

    <?php $form = ActiveForm::begin(); ?>



    <?=
    $form->field($model, 'menucode')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\MMenucfg::find()->all(), 'menucode', 'menulink'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Menu..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?=
    $form->field($model, 'group_user')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(\app\models\MGroup::find()->all(), 'GROUPID', 'GROUPNAME'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Group Pengguna..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
