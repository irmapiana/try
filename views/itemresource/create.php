<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\Models\Mproduct */

$this->title = 'Tambah Item Resource';
$this->params['breadcrumbs'][] = ['label' => 'Mitemresources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mitemreource-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
