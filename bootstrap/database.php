<?php

use Illuminate\Database\Capsule\Manager;

$database_config =[
    "driver"=>"mysql",
    "host"=>"127.0.0.1",
    "database"=>"slim_api",
    "username"=>"root",
    "password"=>"",
    "charset"=>"utf8",
    "collation"=>"utf8_unicode_ci",
    "prefix"=>""
];



$capsule =new Manager;

$capsule->addConnection($database_config);

$capsule->setAsGlobal();

$capsule->bootEloquent();

