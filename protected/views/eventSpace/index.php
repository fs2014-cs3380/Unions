<?php
$this->breadcrumbs=array(
	'Event Spaces',
);

$this->menu=array(
array('label'=>'Create EventSpace','url'=>array('create')),
array('label'=>'Manage EventSpace','url'=>array('admin')),
);
?>

<h1>Event Spaces</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
