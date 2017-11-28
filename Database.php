<?php

error_reporting(1);
session_start();

define("DB_LINK", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "siac17");
    
class Database {
    
    private $link;
    
    public function __construct() {
        $this->link = mysqli_connect(DB_LINK, DB_USER, DB_PASSWORD, DB_DATABASE);
        if(!$this->link) {
            echo mysqli_connect_error();
        }
    }
    
    public function __destruct() {
        if($this->link) mysqli_close($this->link);
    }
    
    public function email_exists($email) {
        $sql = "SELECT id from `creds` WHERE email='$email';";
        $res = mysqli_query($this->link, $sql);
        return mysqli_num_rows($res)==1;
    }
    
    public function signup($name, $email, $pwd) {
        if($this->link) {
            if( !$this->email_exists($email) ) {
                $sql = "INSERT INTO `creds`(name, email, password) VALUES('$name', '$email', '$pwd');";
                $res = mysqli_query($this->link, $sql);
                if( mysqli_affected_rows($this->link)==1 ) return true;
                else return "Signup Failed. Try after sometime.";
            }
            else return "User already exists!";
        }
        else {
            return "Couldn't connect to database.";
        }
    }
    
    public function login($email, $password) {
        if($this->link) {
            $sql = "SELECT * FROM creds WHERE email='$email' AND password='$password';";
            $res = mysqli_query($this->link, $sql);
            if(mysqli_num_rows($res)==1) {
                $row = mysqli_fetch_assoc($res);
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['created_on'] = $row['created_on'];
                return true;
            }
            else return "Invalid credentials.";
        } else return "Couldn't connect to database. Try after sometime.";
    }
    
    public function num_records(){
        if($this->link) {
            $sql = "SELECT COUNT(id) AS totalID FROM records;";
            $res = mysqli_query($this->link, $sql);
            return mysqli_fetch_assoc($res)['totalID'];
        } else return 1;
    }
    public function update() {
        if($this->link) {
            if( $this->num_records() == 0 ) return -1;
            
            $ts=""; $sql="";
            if(isset($_SESSION["ts"])) {
                $ts = $_SESSION['ts'];
                $sql = "SELECT id,daydream,time FROM records WHERE id>$ts ORDER BY id DESC;";
            }
            else {
                $sql = "SELECT id,daydream,time FROM records ORDER BY id DESC LIMIT 20;";
            }
            
            $res = mysqli_query($this->link, $sql);
            if($res) {
                $arr = array();
                while( $row = mysqli_fetch_assoc($res) ) {
                    $arr[] = $row;
                }
                
                if( !empty($arr) ) {
                    $_SESSION["ts"] = $arr[0]['id'];
                }
                
                return $arr;
            }
            else return false;
        }
    }
}

?> 
