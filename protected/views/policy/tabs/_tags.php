<?php
$this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
        'headerOffset' => 30,
        // 40px is the height of the main navigation at bootstrap
        'type' => 'striped',
        'dataProvider' => $tags->search(),
        'filter'=>$tags,
        'template' => "{items}{pager}",
        'columns' => array(
            'tag',
            array(
                'name'=>'tagged_count',
                'header'=>'# of Policies',
                'filter'=>false,
                'value'=>'$data->taggedCount',
            ),
        ),
    )
);