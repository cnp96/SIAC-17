<?php
/*
create table if not exists creds( 
    id int(10) not null auto_increment, 
    name varchar(50) not null, 
    email varchar(40) not null, 
    password varchar(20) not null, 
    created_on timestamp default current_timestamp, 
    primary key pk_id(id), 
    unique key uk_email(email) 
    );
*/

error_reporting(0);
session_start();

define("DB_LINK", "codesnip.xyz");
define("DB_USER", "chiku");
define("DB_PASSWORD", "Password@1");
define("DB_DATABASE", "shonak");
    
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
}

?>