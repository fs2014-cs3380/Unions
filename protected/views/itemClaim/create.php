<?php
$this->breadcrumbs=array(
	'Item Claims'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ItemClaim','url'=>array('index')),
array('label'=>'Manage ItemClaim','url'=>array('admin')),
);
?>

<h1>Create ItemClaim</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>