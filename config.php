<?php

/**
 * This is config class which has methods related to database
 * like connect and getInstance from config class using (singletone) design pattern
 * 
 * @author Mohab
 */
class config {
    
    /**
     * @var string to set value of host
     * @var string to set value of user
     * @var string to set value of password
     * @var string to set value of database name
     * @var object to set value of connection 
     */
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'yellow';
    private $mycon;
    
    public static $instance;
    public  static $val;
    
    /**
     * @return object which is instance from connection
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $obj = new config();
            self::$val = $obj->connect();
            self::$instance = new config();
        }
        return self::$val;
    }
    
    
    /**
     * @return object which is mysqli_object
     */
    public function connect() {
        $con =  mysqli_connect($this->host, $this->user ,$this->pass ,$this->db);
        if(!$con){
            die("Database error");
        }else {
             $this->mycon = $con;
        }
        return $this->mycon;
    }
}
