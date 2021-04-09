<?php

// This function makes PDO connection to MySQL database
function db_connection() {
    $PDO = new PDO("mysql:host=localhost;dbname=stock_control;charset=utf8", "root", null);
    return $PDO;
}