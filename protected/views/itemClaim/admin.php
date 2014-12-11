<?php
$this->breadcrumbs = array(
    'Item Claims' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List ItemClaim', 'url' => array('index')),
    array('label' => 'Create ItemClaim', 'url' => array('create')),
);

?>

<h1>Manage Claimed Items</h1>

<?php $this->widget('booster.widgets.TbGridView', array(
    'id' => 'item-claim-grid',
    'dataProvider' => $model->search(),
    'columns' => array(
        array(
            'name'=>'item_id',
            'value'=>'$data->item->description',
        ),
        'first_name',
        'last_name',
        'email',
        array(
            'class' => 'booster.widgets.TbButtonColumn',
        ),
    ),
)); ?>
