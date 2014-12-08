<?php
$this->breadcrumbs=array(
	'Group Name Changes'=>array('index'),
	$model->group_id=>array('view','id'=>$model->group_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List GroupNameChange','url'=>array('index')),
	array('label'=>'Create GroupNameChange','url'=>array('create')),
	array('label'=>'View GroupNameChange','url'=>array('view','id'=>$model->group_id)),
	array('label'=>'Manage GroupNameChange','url'=>array('admin')),
	);
	?>

	<h1>Update GroupNameChange <?php echo $model->group_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>