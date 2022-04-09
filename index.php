<?php header("location: pages/login.php");

if(!isset($_SESSION["user"])){
    header("location:pages/login.php");
} else {header("location:pages/dashboard.php");}