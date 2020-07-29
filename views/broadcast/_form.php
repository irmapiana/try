<?php

use yii\helpers\Html;
use yii\widgets\activeForm;
use kartik\widgets\DatePicker;
use app\models\Broadcast;
use yii\bootstrap\Modal;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\broadcast */
/* @var $form yii\widgets\activeForm */
?>

<div class="broadcast-form">

    <?php $form = activeForm::begin(); ?>

    <!--?= $form->field($model, 'TOPICID')->textInput(['maxlength' => true]) ?-->
    <?= $form->field($model, 'TOPICID')->dropdownList(['0001' => 'PENGUMUMAN', '0002' => 'PROMO']) ?>
    <?= $form->field($model, 'TITLE')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'POSTDATE')->widget(DatePicker::classname(),[
              'options' => ['placeholder' => ''],
              //'value' => 'dd-mm-yyyy',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              
              'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => TRUE,
            ]
        ]);
    ?>
    <?= $form->field($model, 'POSTBY')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'MESSAGE')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'MESSAGEID')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <!--?= Html::a('Batal', Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?-->
        <?= Html::a(Yii::t('app', 'Batal'), ['index'], ['class' => 'btn btn-warning']) ?>
       <!-- ?= Html::a(Yii::t('app', 'sendNotif'), ['send'], ['class'=> 'btn btn-success' : 'btn btn-primary']) ?-->

    </div>

    <?php activeForm::end(); ?>

</div>
