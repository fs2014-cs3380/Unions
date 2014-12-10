<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->item_id,
);

$this->menu=array(
array('label'=>'List Item','url'=>array('index')),
array('label'=>'Create Item','url'=>array('create')),
array('label'=>'Update Item','url'=>array('update','id'=>$model->item_id)),
array('label'=>'Delete Item','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->item_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Item','url'=>array('admin')),
);
?>

<h1>View Item #<?php echo $model->item_id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'item_id',
		'location',
		'description',
		'found_user',
		'found_date',
		'item_type_id',
		'status',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
