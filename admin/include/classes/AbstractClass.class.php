<?php
  
class AbstractClass 
{
    protected static $_db;
    
    public function __construct() {
        self::$_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
        if (self::$_db->connect_errno) {
            printf("Connect failed: %s\n", self::$_db->connect_error);
            exit();
        }
    }
    
}
  
