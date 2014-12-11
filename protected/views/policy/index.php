<?php
$this->breadcrumbs = array(
    'Policies',
);

$this->menu = array(
    array('label' => 'Create Policy', 'url' => array('create')),
    array('label' => 'Manage Policy', 'url' => array('admin')),
);

/* @todo Add select2 search filter */
?>


<?php
echo CHtml::htmlButton('<i class="fa fa-search"></i>', array(
    'id' => 'search_policies',
    'class' => 'btn',
    'title' => 'Search Policies',
));


$this->widget('booster.widgets.TbSelect2', array(
    'name' => 'tag-search',
    'htmlOptions' => array('style' => 'display: inline-block',),
    'asDropDownList' => false,
    'htmlOptions' => array(
        'class' => 'unit_select',
        'style' => 'width: 96%;',
    ),
    'options' => array(
        'tags' => Tag::getSearchTags(),
        'placeholder' => ' ',
        'allowClear' => true,
    ),

));


?>
<div id="policies">
<?php $this->renderPartial('_policies', array('categories'=>$categories), false, false); ?>
</div>
<script type="text/javascript">
    $('body').on('click', '#search_policies', function () {
        $.ajax({
            url: "<?php echo $this->createUrl('/policies'); ?>",
            type: 'POST',
            data: {Tags: $('#tag-search').val()},
            success: function (result) {
                $('#policies').html(result);
            }
        });
    });
</script>
