<?php
$this->breadcrumbs = array(
    'Items',
);

$this->menu = array(
    array('label' => 'Create Item', 'url' => array('create')),
    array('label' => 'Manage Item', 'url' => array('admin')),
);

$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'brand' => 'Lost and Found',
        'fixed' => false,
        'fluid' => true,

    )
);
$this->widget('booster.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
