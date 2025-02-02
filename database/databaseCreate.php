<?php
$host = "localhost:3306";
$username = "root";
$password = "";
$conn = mysqli_connect($host, $username, $password);
$sql = "create database smc2";
$result = mysqli_query($conn, $sql);
if ($result)
    echo "create database success";
