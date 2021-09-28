<?php

session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR ); 

require_once ROOT_PATH . 'classes/DatabaseConnection.php';
require_once ROOT_PATH . 'classes/Entity.php';
require_once ROOT_PATH . 'classes/User.php';
require_once ROOT_PATH . 'classes/Auth.php';
include( ROOT_PATH . 'config.php');

//Database conneciton
DatabaseConnection::connect(DBHOST,DBNAME,DBUSER,DBPWD);
$dbInstance = DatabaseConnection::getInstance();
$dbConnection = $dbInstance->getConneciton();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user_name'];
    $password = $_POST['password'];
    $auth = new Auth();
    $login_status = $auth->checkLogin($username,$password) ;
    if($login_status){
        $_SESSION["is_admin"]  = $login_status;
        header('Location: ../home.php');
        exit();
    }
  }

  $_SESSION["success"]  = false;
  header('Location: ../index.php');
?>