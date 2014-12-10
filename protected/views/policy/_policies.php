<?php
$this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
        'headerOffset' => 30,
        // 40px is the height of the main navigation at bootstrap
        'type' => 'striped',
        'dataProvider' => $policies->search(),
        'filter'=>$policies,
        'template' => "{items}{pager}",
        'columns' => array(
            array(
                'name'=>'title',
                'value'=>'strlen($data->title) > 40 ? substr($data->title, 0, 40)."..." : $data->title'
            ),
            array('name'=>'text', 'value'=>'substr(strip_tags($data->text), 0, 100)."..."', 'type'=>'html'),
            array(
                'class'=>'booster.widgets.TbButtonColumn',
            ),
        ),
    )
);