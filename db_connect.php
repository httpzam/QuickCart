<?php
$servername = "sql302.infinityfree.com";
$username   = "if0_40110261";
$password   = "YPzexocLYa";
$dbname     = "if0_40110261_QuickCart";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
