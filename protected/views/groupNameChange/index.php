<?php
$this->breadcrumbs=array(
	'Group Name Changes',
);

$this->menu=array(
array('label'=>'Create GroupNameChange','url'=>array('create')),
array('label'=>'Manage GroupNameChange','url'=>array('admin')),
);
?>

<h1>Group Name Changes</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
