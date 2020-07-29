<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="mmconfig-search">
    
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]);
    ?>

    <?= $form->fields($model, 'identifier') ?>
    <?= $form->fields($model, 'url_mode') ?>
    <?= $form->fields($model, 'active') ?>
    <?= $form->fields($model, 'value') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>