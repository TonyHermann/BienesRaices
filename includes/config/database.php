<?php

function connectDb() {
    $db = new mysqli($hostname = "x", $username = 'x', $password = 'x', $database = 'x', $port = 'x');
    if (!$db) {
        echo "Error, no se pudo conectar";
        echo $db;
        exit;
    }
    return $db;
}   