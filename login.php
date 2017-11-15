<?php

error_reporting(0);
session_start();

if( !isset($_SESSION["id"]) ) {
    if( isset($_POST["email"]) && !empty($_POST["email"]) ) {
        if( isset($_POST["pwd"]) && !empty($_POST["pwd"]) ) {
            include "Database.php";
            $obj = new Database();
            $email = htmlentities(trim($_POST["email"]));
            $pwd = htmlentities($_POST["pwd"]);
            $res = $obj->login($email, $pwd);
            echo $res===true ? 1 : $res;
            unset($obj);
        } else echo "Invalid Password.";
    } else echo "Invalid Email Address.";
} 
else {
    echo "0";
}

?>