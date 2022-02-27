<?php

function connectDb() {
    $db = new mysqli('127.0.0.1', 'root', '', 'bienes_raices', '3310');
    if (!$db) {
        echo "Error, no se pudo conectar";
        echo $db;
        exit;
    }
    return $db;
}   