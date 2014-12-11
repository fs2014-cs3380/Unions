<?php
$this->breadcrumbs=array(
	'Item Claims'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ItemClaim','url'=>array('index')),
	array('label'=>'Create ItemClaim','url'=>array('create')),
	array('label'=>'View ItemClaim','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ItemClaim','url'=>array('admin')),
	);
	?>

	<h1>Update ItemClaim <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>