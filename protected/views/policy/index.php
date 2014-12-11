<?php
$this->breadcrumbs = array(
    'Policies',
);

$this->menu = array(
    array('label' => 'Create Policy', 'url' => array('create')),
    array('label' => 'Manage Policy', 'url' => array('admin')),
);

?>

<h1>Policies <span style="font-size: 10pt;"><?php if(!Yii::app()->user->isGuest):?>(<a href="<?php echo $this->createUrl('admin'); ?>">Admin</a>)<?php endif;?></span>
</h1>

<p>The Missouri Student Unions - Memorial Student Union and the MU Student Center - serve as community centers on
    the
    University of Missouri campus. They provide quality facilities, services and conveniences for all the students,
    faculty, staff and guests of the University. As programming and event centers, the Missouri Student Unions are a
    welcoming environment for meeting, socializing, learning and developing.</p>

<p>The Missouri Student Unions enforces all M-Book policies as it relates to events and requests within the Missouri
    Student Unions facilities.&#160; Further information about the M-Book can be found <a
        href="http://conduct.missouri.edu/for-students/m-book/"
        target="_blank">here</a>.</p>

<?php
echo CHtml::htmlButton('<i class="fa fa-search"></i>', array(
    'id' => 'search_policies',
    'class' => 'btn',
    'title' => 'Search Policies',
));


$this->widget('booster.widgets.TbSelect2', array(
    'name' => 'tag-search',
    'asDropDownList' => false,
    'htmlOptions' => array(
        'class' => 'unit_select',
        'style' => 'width: 96%; display: inline-block; position: relative; right: 2px;',
    ),
    'options' => array(
        'tags' => Tag::getSearchTags(),
        'placeholder' => 'Search Tags',
        'allowClear' => true,
    ),

));


?>

<h2>Our Policy On...</h2>
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
