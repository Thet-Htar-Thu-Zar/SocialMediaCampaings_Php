<?php
include("databaseconnection.php");
$sql = "create table user2 (userid int primary key auto_increment,fname varchar(15), lname varchar(15), email varchar(30),phone_no int not null,password varchar(16))";
$result = mysqli_query($conn, $sql);
if ($result)
    echo "create table successful";
