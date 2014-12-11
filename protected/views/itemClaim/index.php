<?php
$this->breadcrumbs=array(
	'Item Claims',
);

$this->menu=array(
array('label'=>'Create ItemClaim','url'=>array('create')),
array('label'=>'Manage ItemClaim','url'=>array('admin')),
);
?>

<h1>Item Claims</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
