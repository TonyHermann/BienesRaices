<?php

function connectDb() {
    $db = new mysqli($hostname = "us-cdbr-east-05.cleardb.net", $username = 'b07b5fc4ca8d25', $password = '94648d17', $database = 'heroku_edcd461d431c03e', $port = '3306');
    if (!$db) {
        echo "Error, no se pudo conectar";
        echo $db;
        exit;
    }
    return $db;
}   