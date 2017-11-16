<?php

error_reporting(0);
session_start();

if( isset($_SESSION["id"]) ) {
    unset($_SESSION["id"]);
    unset($_SESSION["ts"]);
    unset($_SESSION["name"]);
    unset($_SESSION["email"]);
}
header("Location: index.php");

?>