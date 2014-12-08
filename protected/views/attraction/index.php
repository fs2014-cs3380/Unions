<?php
$this->breadcrumbs=array(
	'Attractions',
);

$this->menu=array(
array('label'=>'Create Attraction','url'=>array('create')),
array('label'=>'Manage Attraction','url'=>array('admin')),
);
?>

<h1>Attractions</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
