<?php
$this->breadcrumbs=array(
	'Group Name Changes'=>array('index'),
	$model->group_id,
);

$this->menu=array(
array('label'=>'List GroupNameChange','url'=>array('index')),
array('label'=>'Create GroupNameChange','url'=>array('create')),
array('label'=>'Update GroupNameChange','url'=>array('update','id'=>$model->group_id)),
array('label'=>'Delete GroupNameChange','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->group_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage GroupNameChange','url'=>array('admin')),
);
?>

<h1>View GroupNameChange #<?php echo $model->group_id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'group_id',
		'new_name',
		'old_name',
		'status',
		'create_pawprint',
),
)); ?>
