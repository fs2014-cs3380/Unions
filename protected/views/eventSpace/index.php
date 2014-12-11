<?php
$this->breadcrumbs = array(
    'Event Spaces',
);

$this->menu = array(
    array('label' => 'Create EventSpace', 'url' => array('create')),
    array('label' => 'Manage EventSpace', 'url' => array('admin')),
);
?>

<?php

foreach ($buildings as $building) {
    echo '<h1 style="clear: both;">';
    echo $building->name;
    echo '</h1>';
    foreach ($building->floors as $floor) {
        $i = 1;
        echo '<h2 style="clear: both;">';
        echo $floor->name;
        echo '</h2>';
        echo '<div class="items">';
        foreach ($floor->eventSpaces as $room) {
            if ($i == 1)
                echo CHtml::openTag('div', array('class' => 'row-fluid'));
                    echo '<div class="col-sm-3">';
                        echo '<div class="thumbnail">';
                            echo '<img src="http://yiibooster.clevertech.biz/images/placeholder260x180.gif" alt="" />';
                            echo '<div class="caption">';
                                echo '<h5>'.CHtml::link($room->name, $this->createUrl('/room/'.$room->event_space_id)).'</h5>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';

            if ($i == 3) {
                echo '</div>';
                $i=1;
            } else
                $i++;
        }
        echo '</div>';
    }
}

?>
