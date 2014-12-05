<?php
$this->breadcrumbs=array(
	'Event Spaces'=>array('index'),
	$model->name=>array('view','id'=>$model->event_space_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List EventSpace','url'=>array('index')),
	array('label'=>'Create EventSpace','url'=>array('create')),
	array('label'=>'View EventSpace','url'=>array('view','id'=>$model->event_space_id)),
	array('label'=>'Manage EventSpace','url'=>array('admin')),
	);
	?>

	<h1>Update EventSpace <?php echo $model->event_space_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>