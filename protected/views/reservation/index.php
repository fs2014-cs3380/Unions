<?php
$this->breadcrumbs=array(
	'Reservations',
);

$this->menu=array(
array('label'=>'Create Reservation','url'=>array('create')),
array('label'=>'Manage Reservation','url'=>array('admin')),
);
?>

<h1>Reservations</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
