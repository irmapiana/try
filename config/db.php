<?php

return [
   'class' => 'yii\db\Connection',
   //'dsn' => 'pgsql:host=36.68.228.76;dbname=mbb;port=2345',
   //'dsn' => 'pgsql:host=192.168.20.99;dbname=mbb;port=5432',
    'dsn' => 'pgsql:host=192.168.77.54;dbname=mbb;port=5432',
    //'dsn' => 'pgsql:host=192.168.100.94;dbname=mbb;port=5432',
   //'dsn' => 'pgsql:host=103.30.123.15;dbname=mbb;port=5432',
   'username' => 'postgres',
   'password' => 'postgres',
   'charset' => 'utf8',
    'schemaMap' => [ 
      'pgsql'=> [
        'class'=>'yii\db\pgsql\Schema',
        'defaultSchema' => 'public' //specify your schema here
      ]
    ], // PostgreSQL
];
