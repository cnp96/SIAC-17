<?php
    error_reporting(0);
    session_start();
    
    if(isset($_SESSION["id"])) {
        include 'Database.php';
        $obj = new Database();
        $response = $obj->update();
        if( $response===false ) echo "-1";
        else if( empty($response) ) echo "0";
        else echo json_encode($response);
    }
    else header("Location: index.php");

?>