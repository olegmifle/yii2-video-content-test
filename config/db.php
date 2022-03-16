<?php

use yii\db\Connection;

return [
    'class' => Connection::class,
    'dsn' => 'pgsql:host=postgresql;dbname=yii2basic',
    'username' => 'root',
    'password' => 'secret',
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 3600,
    'schemaCache' => 'cache',
];
