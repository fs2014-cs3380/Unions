<?php
$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->reservation_id,
);

$this->menu=array(
array('label'=>'List Reservation','url'=>array('index')),
array('label'=>'Create Reservation','url'=>array('create')),
array('label'=>'Update Reservation','url'=>array('update','id'=>$model->reservation_id)),
array('label'=>'Delete Reservation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->reservation_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Reservation','url'=>array('admin')),
);
?>

<h1>View Reservation #<?php echo $model->reservation_id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'reservation_id',
		'event_space_id',
		'user_id',
		'start_time',
		'end_time',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
),
)); ?>
