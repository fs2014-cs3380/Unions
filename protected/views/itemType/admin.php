<?php
$this->breadcrumbs = array(
    'Item Types' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List ItemType', 'url' => array('index')),
    array('label' => 'Create ItemType', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('item-type-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Item Types</h1>

<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search', array(
        'model' => $model,
    )); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView', array(
    'id' => 'item-type-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array('name' => 'name', 'header' => 'Item Type', 'filter' => false),

        array(
            'name' => 'user_id',
            'value' => 'User::model()->findByPk($data->create_user_id)->email_address',
            'filter' => false,
        ),
        array(
            'name' => 'status',
            'value' => '$data->ajaxStatusOptions()',
            'filter' => ItemType::getStatusOptions(),
        ),
    ),
)); ?>



