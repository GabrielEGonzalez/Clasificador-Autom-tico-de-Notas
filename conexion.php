<?php

$localhost = "";
$password = "";
$database = "";
$user = "";
try {
    $conn = new mysqli("localhost", "user", "password", "database");
    
    if($conn->connect_error()){
        return null;
    }

    return $conn;
} catch (\Throwable $th) {
    //throw $th;
}