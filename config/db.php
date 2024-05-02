<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'sqlsrv:Server=172.16.1.250;Database=Ecommerce;Encrypt=0;TrustServerCertificate=1',
    'username' => 'sa',
    'password' => 'sapo',
    'charset' => 'utf8',
    'on afterOpen' => function($event) {
        $event->sender->createCommand("SET DATEFORMAT DMY
            SET LANGUAGE spanish")->execute();
    }

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
