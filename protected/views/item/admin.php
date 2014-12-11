<?php
$this->breadcrumbs=array(
	'Items'=>array('index'),
	'Manage',
);

/*$this->menu=array(
array('label'=>'List Item','url'=>array('index')),
array('label'=>'Create Item','url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('item-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'item-grid',
'dataProvider'=>$model->search(),
/*'filter'=>$model,*/
'columns'=>array(
		'item_id',
		'location',
		'description',
		'found_user',
		'found_date',
		'item_type_id',
        array(
           'name'=>'status',
            'value'=>'$data->statuses->description',
        ),
		/*
		'status',
		'create_time',
		'create_user_id',
		'update_time',
		'update_user_id',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
