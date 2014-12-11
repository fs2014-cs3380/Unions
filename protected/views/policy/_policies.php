<?php
$counter = 1;
foreach ($categories as $category) {
    echo $counter == 1 ? '<div id="unions-policies" class="row">' : null;
    echo '<div class="col-sm-4">';
    echo '<h3>' . $category->name . '</h3>';
    echo '<ul>';
    foreach ($category->policies as $policy) {
        echo '<li>';
        echo CHtml::link($policy->title, $this->createUrl('view', array('id' => $policy->policy_id)));
        echo '</li>';
    }
    echo '</ul>';
    echo '</div>';
    echo $counter == 3 ? '</div>' : null;
    $counter == 3 ? $counter = 1 : $counter++;
}
?>