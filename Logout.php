<?php

session_start();
unset($_SESSION["userid"]);
header("location:Home.php");
