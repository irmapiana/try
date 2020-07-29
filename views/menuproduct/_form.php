<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\db\ActiveRecord;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Dproductitem;
use app\models\Mproduct;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Bank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menuproduct-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_menuid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'next_class')->textInput(['maxlength' => true]) ?>
    
     <?=
    $form->field($model, 'productid')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Mproduct::find()->where(['active'=>'Y'])->orderBy(['product_name' => SORT_ASC])->all(), 'productid', 'productid'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Produk..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        'disabled' => isset($used) ? $used : false,
    ]);
    ?>
     <?=
    $form->field($model, 'itemid')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Dproductitem::find()->where(['active'=>'Y'])->orderBy(['itemname' => SORT_ASC])->all(), 'itemid', 'itemid'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Produk Item..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        'disabled' => isset($used) ? $used : false,
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
