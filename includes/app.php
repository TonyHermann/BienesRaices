<?php


require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';
require 'funciones.php';

use Model\ActiveRecord;

//Conectarnos a la DB

$db = connectDb();

ActiveRecord::setDB($db);

