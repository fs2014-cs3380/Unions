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



<h1>Policies <span style="font-size: 10pt;">(<a href="<?php echo $this->createUrl('admin'); ?>">Admin</a>)</span></h1>
<p>The Missouri Student Unions - Memorial Student Union and the MU Student Center - serve as community centers on the
    University of Missouri campus. They provide quality facilities, services and conveniences for all the students,
    faculty, staff and guests of the University. As programming and event centers, the Missouri Student Unions are a
    welcoming environment for meeting, socializing, learning and developing.</p>
<p>The Missouri Student Unions enforces all M-Book policies as it relates to events and requests within the Missouri
    Student Unions facilities.&#160; Further information about the M-Book can be found <a
        href="http://conduct.missouri.edu/for-students/m-book/"
        target="_blank">here</a>.</p>
<h2>Our Policy On...</h2>

    <?php
    $counter = 1;
    foreach ($categories as $category) {
        echo $counter == 1 ? '<div id="unions-policies" class="row">' : null;
        echo '<div class="col-sm-4">';
        echo '<h3>'.$category->name.'</h3>';
        echo '<ul>';
            foreach($category->policies as $policy){
                echo '<li>';
                echo CHtml::link($policy->title, $this->createUrl('view', array('id'=>$policy->policy_id)));
                echo '</li>';
            }
        echo '</ul>';
        echo '</div>';
        echo $counter == 3 ? '</div>' : null;
        $counter == 3 ? $counter = 1 : $counter++;
    }
    ?>

