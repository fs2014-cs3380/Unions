<?php
$this->breadcrumbs=array(
	'Item Types'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ItemType','url'=>array('index')),
array('label'=>'Manage ItemType','url'=>array('admin')),
);
?>

<h1>Create ItemType</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>