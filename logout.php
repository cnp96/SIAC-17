<?php

error_reporting(0);
session_start();

if( isset($_SESSION["id"]) ) {
    unset($_SESSION["id"]);
    unset($_SESSION["ts"]);
    unset($_SESSION["name"]);
    unset($_SESSION["email"]);
    if( isset($_SESSION["pid"]) && $_SESSION["pid"]!="-1" ) {
        $id = $_SESSION["pid"];
        exec("sudo kill -9 $id");
        unset($_SESSION["pid"]);
    }
}
header("Location: index.php");

?>