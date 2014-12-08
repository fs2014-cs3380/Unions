<?php
$this->breadcrumbs=array(
	'Item Types',
);

$this->menu=array(
array('label'=>'Create ItemType','url'=>array('create')),
array('label'=>'Manage ItemType','url'=>array('admin')),
);
?>

<h1>Item Types</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
