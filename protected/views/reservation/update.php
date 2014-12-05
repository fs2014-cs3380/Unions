<?php
$this->breadcrumbs=array(
	'Reservations'=>array('index'),
	$model->reservation_id=>array('view','id'=>$model->reservation_id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Reservation','url'=>array('index')),
	array('label'=>'Create Reservation','url'=>array('create')),
	array('label'=>'View Reservation','url'=>array('view','id'=>$model->reservation_id)),
	array('label'=>'Manage Reservation','url'=>array('admin')),
	);
	?>

	<h1>Update Reservation <?php echo $model->reservation_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>