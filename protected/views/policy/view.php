<?php
$this->breadcrumbs=array(
	'Policies'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List Policy','url'=>array('index')),
array('label'=>'Create Policy','url'=>array('create')),
array('label'=>'Update Policy','url'=>array('update','id'=>$model->policy_id)),
array('label'=>'Delete Policy','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->policy_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Policy','url'=>array('admin')),
);
?>

<h1>View Policy #<?php echo $model->policy_id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'policy_id',
		'title',
		'text',
		'category_id',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
