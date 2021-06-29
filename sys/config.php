<?php return [


    'projectTitle' => 'Yeni Proje Ortamı',


    'session'                 => true,
    'session_lifetime'        => 86400,
    'session_read_and_close'  => true,


    'defaultTimezone' => 'Europe/Istanbul',


    'databaseProfile' => [
        0 => [
            'host'       => 'localhost',
            'user'       => 'root',
            'pass'       => '',
            'dbname'     => 'database_1',
            'charset'    => 'utf8',
            'persistent' => false
        ],
        1 => [
            'host'       => 'localhost',
            'user'       => 'root',
            'pass'       => '',
            'dbname'     => 'database_2',
            'charset'    => 'utf8',
            'persistent' => false
        ]
    ],


    'defaultLayout' => '_public',


    'ssl' => true


];