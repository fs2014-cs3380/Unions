<?php
$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'brand' => 'Lost and Found',
        'fixed' => false,
        'fluid' => true,
        'items' => array(
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'items' => array(
                    array('label' => 'Add Item', 'url' => array('create'), 'active' => true),
                    array('label' => 'Show Claimed Items', 'url' => array('claimed'), 'active' => true),
                    array('label' => 'Show Pending Items', 'url' => array('pending'), 'active' => true),

                )
            )
        )
    )
);