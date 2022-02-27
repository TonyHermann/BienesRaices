<?php

function connectDb() {
    $db = new mysqli('us-cdbr-east-05.cleardb.net', 'b07b5fc4ca8d25', '94648d17', 'bienes_raices', '3306');
    if (!$db) {
        echo "Error, no se pudo conectar";
        echo $db;
        exit;
    }
    return $db;
}   