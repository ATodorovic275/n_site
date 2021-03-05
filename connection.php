<?php

$server = "localhost";
$dbName = 'nebojsa_anketa';
$username = 'root';
$password = '';


try {
    $conn = new PDO("mysql:host=$server;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (\PDOException $ex) {
    echo $ex->getMessage();
}
