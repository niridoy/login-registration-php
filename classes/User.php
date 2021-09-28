<?php

class User extends Entity {
    
    public function __construct($dbc){
        parent::__construct($dbc,'users');
    }

    protected function initFields(){
        
        $this->fields = [
            'Id',
            'UserName',
            'UserId',
            'Password',
            'IsAdmin'
        ];
    } 

    public function store($user_name, $user_id, $password)
    { 
        $sql = "INSERT INTO ".$this->table_name." (UserName, UserId, Password) VALUES('$user_name', '$user_id', '$password')";
        $stmt = $this->dbc->prepare($sql);
        return $stmt->execute();
    }

    public function all()
    { 
        $sql = "SELECT * FROM ".$this->table_name ." ";
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute();
        foreach($stmt as $row) {
            $users[] = $row;
        }
        return $users;
    }
}