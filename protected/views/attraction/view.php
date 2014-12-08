<?php
$this->breadcrumbs=array(
	'Attractions'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List Attraction','url'=>array('index')),
array('label'=>'Create Attraction','url'=>array('create')),
array('label'=>'Update Attraction','url'=>array('update','id'=>$model->attraction_id)),
array('label'=>'Delete Attraction','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->attraction_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Attraction','url'=>array('admin')),
);
?>

<h1>View Attraction #<?php echo $model->attraction_id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'attraction_id',
		'name',
		'image_path',
		'lim_id',
		'information_url',
		'url_display_name',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		'building_id',
),
)); ?>
