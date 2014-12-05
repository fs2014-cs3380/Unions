<?php
$this->breadcrumbs=array(
	'Event Spaces'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List EventSpace','url'=>array('index')),
array('label'=>'Create EventSpace','url'=>array('create')),
array('label'=>'Update EventSpace','url'=>array('update','id'=>$model->event_space_id)),
array('label'=>'Delete EventSpace','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->event_space_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage EventSpace','url'=>array('admin')),
);
?>

<h1>View EventSpace #<?php echo $model->event_space_id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'event_space_id',
		'name',
		'floor_id',
		'capacity',
		'image_path',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
