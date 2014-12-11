<?php
$this->breadcrumbs = array(
    'Item Types' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List ItemType', 'url' => array('index')),
    array('label' => 'Create ItemType', 'url' => array('create')),
);
?>

<h1>Item Types</h1>

<?php $this->widget('booster.widgets.TbGridView', array(
    'id' => 'item-type-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array('name' => 'name', 'header' => 'Item Type', 'filter' => false),

        array(
            'name' => 'user_id',
            'value' => 'is_null($user = User::model()->findByPk($data->create_user_id)) ? "<i>Unknown</i>" : $user->email_address',
            'filter' => false,
            'type'=>'raw'
        ),
        array(
            'name' => 'status',
            'value' => '$data->ajaxStatusOptions()',
            'filter' => ItemType::getStatusOptions(),
        ),
    ),
)); ?>



