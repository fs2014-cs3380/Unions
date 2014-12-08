<?php
$this->breadcrumbs=array(
	'Policies'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Policy','url'=>array('index')),
array('label'=>'Manage Policy','url'=>array('admin')),
);
?>

<h1>Create Policy</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>