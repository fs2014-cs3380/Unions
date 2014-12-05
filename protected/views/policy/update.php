<?php
$this->breadcrumbs=array(
	'Policies'=>array('index'),
	$model->title=>array('view','id'=>$model->policy_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Policy','url'=>array('index')),
	array('label'=>'Create Policy','url'=>array('create')),
	array('label'=>'View Policy','url'=>array('view','id'=>$model->policy_id)),
	array('label'=>'Manage Policy','url'=>array('admin')),
	);
	?>

	<h1>Update Policy <?php echo $model->policy_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>