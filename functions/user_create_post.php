<?php

session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..'  . DIRECTORY_SEPARATOR ); 

require_once ROOT_PATH . 'classes/DatabaseConnection.php';
require_once ROOT_PATH . 'classes/Entity.php';
require_once ROOT_PATH . 'classes/User.php';
include( ROOT_PATH . 'config.php');

//Database conneciton
DatabaseConnection::connect(DBHOST,DBNAME,DBUSER,DBPWD);
$dbInstance = DatabaseConnection::getInstance();
$dbConnection = $dbInstance->getConneciton();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // do logic
    $username = $_POST['user_name'];
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    if(!$_POST['user_name'] || !$_POST['user_id'] || !$_POST['user_id']){
        $_SESSION["success"]  = false;
        header('Location: ../user-create.php');
        exit();
    }

    $user = new User($dbConnection);
    $user->findBy('UserId',$user_id);

    if(property_exists($user,'Id')){
        $_SESSION["success"]  = false;
        $_SESSION["has_unique"]  = true;
        header('Location: ../user-create.php');
        exit();
    }

    if($user->store($username,$user_id,md5($password))){
        $_SESSION["success"]  = true;
        header('Location: ../user-list.php');
        exit();
    } else {
        $_SESSION["success"]  = false;
        header('Location: ../user-create.php');
    }
  }else {
    $_SESSION["success"]  = false;
    header('Location: ../user-create.php');
  }
?>