<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Mschema */

$this->title = 'TAMBAH USER SKEMA';
$this->params['breadcrumbs'][] = ['label' => 'Muserschemaprices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="muserschemaprice-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
