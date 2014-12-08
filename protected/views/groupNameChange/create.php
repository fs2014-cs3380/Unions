<?php
$this->breadcrumbs=array(
	'Group Name Changes'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List GroupNameChange','url'=>array('index')),
array('label'=>'Manage GroupNameChange','url'=>array('admin')),
);
?>

<h1>Create GroupNameChange</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>