<?php

$host = "127.0.0.1";
$user = "root";
$pass = "RlaEhdDud4";
$dbname = "res";


$conn = new mysqli(
    $host,
    $user,
    $pass,
    $dbname,
    3306
);


if ($conn->connect_error) {
    die("DB 연결 실패 : " . $conn->connect_error);
}


$conn->set_charset("utf8mb4");

?>