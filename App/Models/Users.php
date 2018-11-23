<?php

require_once 'C:\xampp\htdocs\YellowAssignment\config.php';

/**
 * This is User Model which have the methods related to users and interact with databse
 * @author Mohab
 */
class Users {

    /**
     * @var object this is object from config class
     * @var object this is object to be mysqli_object
     */
    private $con;
    private $val = null;

    public function __construct() {
        $this->con = new config();
        $this->val = $this->con->getInstance();
    }

    /**
     * @return object containing list of users
     */
    public function listUsers() {
        $query = 'SELECT * FROM `users` WHERE 1';
        $result = mysqli_query($this->val, $query);
        if (!$result || mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    /**
     * 
     * @return boolean if true means user added succssfully ,false means not added
     */
    public function addUser($name, $email) {
        $str = "ABCDEFGHI1234567890";
        $password = str_shuffle($str);
        $checkQuery = "SELECT * FROM `users` WHERE `name` = '" . $name . "' AND `email` = '" . $email . "'";
        $checkResult = mysqli_query($this->val, $checkQuery);
        if (!$checkResult || mysqli_num_rows($checkResult) > 0) {
            return true;
        } else {
            $query = "INSERT INTO `users`(`name`, `email`, `password`, `type`) VALUES ('" . $name . "','" . $email . "','" . $password . "',2)";
            $result = mysqli_query($this->val, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }

}

/**
 * this is interface class that have login function to be implemented by diffrenet ways
 * used this interface to apply (strategy) design pattern
 */
interface loginbehavior {

    /**
     * @param string $param1 this param will be string from username or email
     * @param string $param2 this param will be string from the password
     */
    public function login($param1, $param2);
}

/**
 * this is implement the loginbehavior interface class
 * used to implement function login but using username and password
 */
class userNameLoginClass implements loginbehavior {

    /**
     * @var object this is object from config class
     * @var object this is object to be mysqli_object
     */
    private $con;
    private $val = null;

    public function __construct() {
        $this->con = new config();
        $this->val = $this->con->getInstance();
    }

    /**
     * 
     * @param string $param1 this is the value of username
     * @param string $param2 this is the value of password
     * @return array containing the username and user type
     */
    public function login($param1, $param2) {
        $query = "SELECT * FROM `users` WHERE `name` = " . '"' . $param1 . '"' . " AND `password` = " . '"' . $param2 . '"' . " AND `type` != 2";
        $result = mysqli_query($this->val, $query);
        if (!$result || mysqli_num_rows($result) > 0) {
            $query_values = mysqli_fetch_assoc($result);
            $arr = array($query_values['name'], $query_values['type']);
            return $arr;
        } else {
            echo '<div class="alert alert-danger" role="alert">Enter valid username or password</div>';
        }
    }

}

/**
 * this is implement the loginbehavior interface class
 * used to implement function login but using email and password
 */
class emailLoginClass implements loginbehavior {

    /**
     * @var object this is object from config class
     * @var object this is object to be mysqli_object
     */
    private $con;
    private $val = null;

    public function __construct() {
        $this->con = new config();
        $this->val = $this->con->getInstance();
    }

    /**
     * 
     * @param string $param1 this is the value of email
     * @param string $param2 this is the value of password
     * @return array containing the username and user type
     */
    public function login($param1, $param2) {
        $query = "SELECT * FROM `users` WHERE `email` = " . '"' . $param1 . '"' . " AND `password` = " . '"' . $param2 . '"' . " AND `type` != 2";
        $result = mysqli_query($this->val, $query);
        if (!$result || mysqli_num_rows($result) > 0) {
            $query_values = mysqli_fetch_assoc($result);
            $arr = array($query_values['name'], $query_values['type']);

            return $arr;
        } else {
            echo '<div class="alert alert-danger" role="alert">Enter valid email or password</div>';
        }
    }

}
