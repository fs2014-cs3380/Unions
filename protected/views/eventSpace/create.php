<?php
$this->breadcrumbs=array(
	'Event Spaces'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List EventSpace','url'=>array('index')),
array('label'=>'Manage EventSpace','url'=>array('admin')),
);
?>

<h1>Create EventSpace</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>