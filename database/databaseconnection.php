<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "smc_test";
$conn = mysqli_connect($host, $username, $password, $database);
if ($conn == false) {
    mysqli_connect_error();
}
