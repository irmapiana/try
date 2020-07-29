<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Museraccount;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\VrewmutationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vrewmutation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <table>
    <tr>
    <td>

    <?PHP //$form->field($model, 'MUTATIONID') ?>

    <div style="width:400px">
     <?=
        $form->field($model, 'userid')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Museraccount::find()->all(), 'userid'),
            'language' => 'id',
            'disabled' => !$model->isNewRecord,
            'options' => ['placeholder' => 'Pilih Akun..      '],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
    </div>
    
      <?php
    echo '</td>';


    echo '<td> &nbsp&nbsp&nbsp&nbsp</td>';
    echo '<td>';
    echo '<label class="control-label">Tanggal transaksi:</label>';
    echo '<div style="width:300px">';
    echo '<div class="form-group field-trewmutationsearch-daterage">';
    echo DatePicker::widget([
        'name' => 'from_date',
        'value' => (Yii::$app->request->get('from_date')) ?: date('d-M-Y'),
        'type' => DatePicker::TYPE_RANGE,
        'name2' => 'to_date',
        'value2' => (Yii::$app->request->get('to_date')) ?: '',
        'pluginOptions' => [
            'autoclose'=>true,
             //'format' => 'yyyy-mm-dd',
            'format' => 'dd-M-yyyy',
            'todayHighlight' => TRUE,
            'required' => true,
        ]
    ]);
    echo '</div>';
    echo '</div>';
    echo '</td>';
    echo '</tr>';
    ?>
    </table>
    <br>

    <?PHP //$form->field($model, 'MTYPE') ?>

    <?php //$form->field($model, 'POINT') ?>

    <?php //$form->field($model, 'ENDBALANCE') ?>

    <?php // echo $form->field($model, 'SOURCE_ACCOUNT') ?>

    <?php // echo $form->field($model, 'SOURCE_LEVEL') ?>

    <?php // echo $form->field($model, 'REMARK') ?>

    <?php // echo $form->field($model, 'cby') ?>

    <?php // echo $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'mby') ?>

    <?php // echo $form->field($model, 'mdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Ulangi', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
