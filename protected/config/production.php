<?php
return array(
    // application components
    'components'=>array(
        'cache'=>array(
            // @todo add caching component
            'class'=>'CDummyCache',
        ),

        'db'=>array(
            'connectionString' => 'sqlsrv:server=sql2008.col.missouri.edu; Database=musasapp;',
            'username' => 'musasapp',
            'password' => 'Br23uSg?17f',
            'charset' => 'utf8',
        ),

        //@todo decide on session storage (db or cookie)
        'session'=>array(
            /*'cookieMode'=>'only',
            'sessionName'=>'UM-SAS-Unions',
            // 1hr timeout
            'timeout'=>3600,*/
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        'adminEmail'=>'musasitstaff@missouri.edu',
    ),
);