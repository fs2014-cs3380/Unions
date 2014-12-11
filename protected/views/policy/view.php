<?php
$this->breadcrumbs=array(
	'Policies'=>array('index'),
	$model->title,
);

$this->menu=array(
array('label'=>'List Policy','url'=>array('index')),
array('label'=>'Create Policy','url'=>array('create')),
array('label'=>'Update Policy','url'=>array('update','id'=>$model->policy_id)),
array('label'=>'Delete Policy','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->policy_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Policy','url'=>array('admin')),
);
?>

<h1><?php echo $model->title; ?></h1>

<div><?php echo $model->text; ?></div>
<div>
    <?php
    foreach($model->tags as $tag){
        $this->widget(
            'booster.widgets.TbLabel',
            array(
                'context' => 'warning',
                // 'default', 'primary', 'success', 'info', 'warning', 'danger'
                'label' => CHtml::link('#'.$tag->tag->tag, $this->createUrl('/policies?Tag='.$tag->tag->tag)),
                'encodeLabel'=>false,
            )
        );
    }
    ?>
</div>


