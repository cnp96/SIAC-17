<?php

error_reporting(0);
session_start();

if($_SESSION["id"]) {
    $id = $_SESSION['id'];
    $python = "/usr/bin/python";
    $scriptPath = "/home/ubuntu/my.py";
    
    exec("nohup $python $scriptPath $id > /dev/null 2>/dev/null &");
    exec("ps aux | grep '/home/ubuntu/my.py' | grep -v grep | awk '{ print $2 }' | head -1", $out);
    $_SESSION["pid"] = $out[0]=="" ? "-1" : $out[0];
}

?>