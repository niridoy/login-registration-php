<?php

class Auth {
    
    function checkLogin($username,$password)
    {
        $dbInstance = DatabaseConnection::getInstance();
        $dbConnection = $dbInstance->getConneciton();

        $user = new User($dbConnection);
        $user->findBy('UserId',$username);
        
        if (property_exists($user,'Id')){
            if (md5($password) == $user->Password){
                return $user->IsAdmin ? 'admin' : 'user';
            }
        }
    }

}