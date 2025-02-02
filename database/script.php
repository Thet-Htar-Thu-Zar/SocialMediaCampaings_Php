<?php
include("databaseconnection.php");
$scriptFilename = "smc_test.sql";
$sqlScript = file_get_contents($scriptFilename);

if ($conn->multi_query($sqlScript)) {
    echo "Script $scriptFilename excutes as successfully";
} else {
    echo "Error executing script";
}
