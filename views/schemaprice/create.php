<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\Models\Mschemaprice */

$this->title = 'TAMBAH SKEMA HARGA';
$this->params['breadcrumbs'][] = ['label' => 'Mschemaprice', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="mschemaprice-create">
	
	<?= $this->render('_form',[
		'model'=>$model,
	]) 
	?>
</div>