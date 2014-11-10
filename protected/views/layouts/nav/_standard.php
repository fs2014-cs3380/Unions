<?php
$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'type' =>'inverse',
        'brand' =>false,
        'brandUrl' => '#',
        'collapse' => true, // requires bootstrap-responsive.css
        'fixed' => false,
        'fluid' => true,
        'items' => array(
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'items' => array(
                    array('label' => 'Home', 'url' => '#', 'active' => true),
                    array('label' => 'Link', 'url' => '#'),
                    array(
                        'label' => 'Come Inside',
                        'url' => '#',
                        'items' => array(
                            array('label' => 'Memorial Student Union', 'url' => '#'),
                            array('label' => 'MU Student Center', 'url' => '#'),
                            array('label' => 'Come Inside','url' => '#'),
                        ),
                    ),

                    array(
                        'label' => 'Dine and Shop',
                        'url' => '#',
                        'items' => array(
                            array('label' => 'Memorial Student Union', 'url' => '#'),
                            array('label' => 'MU Student Center', 'url' => '#'),
                            array('label' => 'Come Inside','url' => '#'),
                        ),
                    ),

                    array(
                        'label' => 'Get Involved',
                        'url' => '#',
                        'items' => array(
                            array('label' => 'SUPB', 'url' => '#'),
                            array('label' => 'Unions Art Council', 'url' => '#'),
                            array('label' => 'We Love Our Students','url' => '#'),
                            array('label' => 'Unions Enterprenurial ','url' => '#'),
                            array('label' => 'Unions/US Bank Scholarship Program','url' => '#'),
                            array('label' => 'Unions Financial Literacy Series','url' => '#'),
                            array('label' => 'Unions Internship Program','url' => '#'),
                            array('label' => 'Student Employment','url' => '#'),
                            array('label' => 'Student Life','url' => '#'),
                        ),
                    ),

                    array(
                        'label' => 'Reserve a Space',
                        'url' => '#',
                        'items' => array(
                            array('label' => 'Check Out Our Rooms', 'url' => '#'),
                            array('label' => 'Student Organization Reservations', 'url' => '#'),
                            array('label' => 'Campus Department Reservations','url' => '#'),
                            array('label' => 'Non-University Reservations','url' => '#'),
                            array('label' => 'Reserve a Group Study Room','url' => '#'),
                            array('label' => 'Advertising Opportunities','url' => '#'),
                        ),
                    ),

                    array(
                        'label' => 'Things To Do',
                        'url' => '#',
                        'items' => array(
                            array('label' => 'Check Out Our Rooms', 'url' => '#'),
                            array('label' => 'Student Organization Reservations', 'url' => '#'),
                            array('label' => 'Campus Department Reservations','url' => '#'),
                            array('label' => 'Non-University Reservations','url' => '#'),
                            array('label' => 'Reserve a Group Study Room','url' => '#'),
                            array('label' => 'Advertising Opportunities','url' => '#'),
                        ),
                    ),
                ),
            ),
        ),
    )
);
