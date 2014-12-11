<?php
$this->widget(
    'booster.widgets.TbExtendedGridView',
    array(
        'headerOffset' => 30,
        // 40px is the height of the main navigation at bootstrap
        'type' => 'striped',
        'dataProvider' => $categories->search(),
        'filter'=>$categories,
        'template' => "{items}{pager}",
        'columns' => array(
            'name',
            array(
                'class'=>'booster.widgets.TbButtonColumn',
            ),
        ),
    )
);