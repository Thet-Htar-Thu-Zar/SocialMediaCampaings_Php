<?php
include("./database/databaseconnection.php");
$sid    = $_REQUEST["id"];
$sql = "delete from search_history where search_id=$sid";
$result = mysqli_query($conn, $sql);
if ($result) {
    header("location:BrowsingHistory.php");
}
