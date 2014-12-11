<?php
$this->breadcrumbs=array(
	'Item Claims'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List ItemClaim','url'=>array('index')),
array('label'=>'Create ItemClaim','url'=>array('create')),
array('label'=>'Update ItemClaim','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ItemClaim','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ItemClaim','url'=>array('admin')),
);
?>

<h1>View ItemClaim #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'item_id',
		'first_name',
		'last_name',
		'email',
),
)); ?>
