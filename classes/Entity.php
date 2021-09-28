<?php

abstract class Entity {
     
    protected $dbc;
    protected $table_name;
    protected $fields;

    protected function __construct($dbc,$table)
    {
        $this->dbc = $dbc;
        $this->table_name = $table;
        $this->initFields();
    }

    abstract protected function initFields();

    function findBy($field_name,$field_vale)
    {
       $sql = "SELECT * FROM ".$this->table_name." WHERE ".$field_name." = :value";
       $stmt = $this->dbc->prepare($sql);
       $stmt->execute(['value' => $field_vale]);
       $databaseData = $stmt->fetch();
       if( $databaseData){
            $this->setValues($databaseData);
       }
    }

    function setValues($values)
    {  
        foreach ($this->fields as $fiend_name){
            $this->$fiend_name = $values[$fiend_name];
        }
    }
}