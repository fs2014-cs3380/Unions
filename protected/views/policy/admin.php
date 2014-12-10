<?php
$this->breadcrumbs = array(
    'Policies' => array('index'),
    'Manage',
);

?>

<h1>Manage Policies</h1>
<?php
$this->widget(
    'booster.widgets.TbTabs',
    array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'justified' => true,
        'tabs' => array(
            array(
                'label' => 'Policies',
                'content' => $this->renderPartial('_policies', array('policies'=> $policies), true),
                'active' => true
            ),
            array('label' => 'Tags', 'content' => $this->renderPartial('_tags', array('tags'=> $tags), true)),
            array('label' => 'Categories', 'content' => $this->renderPartial('_categories', array('categories'=> $categories), true)),
        ),
    )
);
?>