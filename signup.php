<?php

error_reporting(0);
session_start();

if( isset($_POST['name']) && !empty($_POST['name']) ) {
    if( isset($_POST['email']) && !empty($_POST['email']) ) {
        if( isset($_POST['pwd']) && !empty($_POST['pwd']) ) {
            include 'Database.php';
            $name = htmlentities( trim($_POST['name']) );
            $email = htmlentities( trim($_POST['email']) );
            $password = htmlentities( $_POST['pwd'] );
            
            $obj = new Database();
            $res = $obj->signup($name, $email, $password);
            echo $res===true ? "1" : $res;
            unset($obj);
        }
        else echo "Enter a valid password.";
    }
    else echo "Enter a valid email.";
}
else echo "Enter a valid name";

?>