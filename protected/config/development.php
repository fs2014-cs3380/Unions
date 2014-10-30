<?php
return array(
    'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>false,
            'ipFilters'=>array('*'),
            'generatorPaths'=>array(
                'booster.gii',
            ),
        ),
    ),
    // application components
    'components'=>array(
        'cache'=>array(
            'class'=>'CDummyCache',
        ),

        'db'=>array(
            'connectionString' => 'mysql:host=argo.col.missouri.edu;dbname=unions',
            'emulatePrepare' => true,
            'username' => 'unions',
            'password' => 'iVIOwk*ivx',
            'charset' => 'utf8',
        ),

        'session'=>array(
            /*'cookieMode'=>'only',
            'sessionName'=>'UM-SAS-Unions',
            // 1hr timeout
            'timeout'=>3600,*/
        ),
    ),

    // using Yii::app()->params['paramName']
    'params'=>array(
        'adminEmail'=>'ahnera@missouri.edu',
    ),
);