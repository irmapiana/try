<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Mschema */

$this->title = 'TAMBAH SKEMA';
$this->params['breadcrumbs'][] = ['label' => 'Mschemas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mschema-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
