<?php
$this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
        'fixedHeader' => true,
        'headerOffset' => 40,
        // 40px is the height of the main navigation at bootstrap
        'type' => 'striped',
        'dataProvider' => $policies->search(),
        'responsiveTable' => true,
        'template' => "{items}",
        'columns' => array(
            'policy_id',
            'title',
            array('name'=>'text', 'value'=>'htmlspecialchars_decode($data->text)', 'type'=>'raw'),
            array(
                'class'=>'booster.widgets.TbButtonColumn',
            ),
        ),
    )
);