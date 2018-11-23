<?php

require_once 'C:\xampp\htdocs\YellowAssignment\App\Models\Users.php';
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}

/**
 * This is User Controller which have the methods related to users
 * @author Mohab
 */
class userController {

    /**
     * @var object create object from user model
     * @var string to set and get value of name
     * @var string to set and gat value of email
     * @var string to set and gat value of password
     * @var numeric to set and get id of type
     */
    private $userModelObject = null;
    private $name;
    private $email;
    private $password;
    private $type;

    public function __construct() {
        $this->userModelObject = new Users();
    }

    /**
     * @param string $name to set the value of name
     */
    public function setName($name) {
        $this->name = $name;
    }
    
    
    /**
     * @return string to get the value of name
     */
    public function getName() {
        return $this->name;
    }
    
    
    /**
     * @param string $email to set the value of email
     */
    public function setEmail($email) {
        $this->email = $email;
    }
    
    
    /**
     * @return string to get the value of email
     */
    public function getEmail() {
        return $this->email;
    }
    
    
    /**
     * @param string $password to set the value of password
     */
    public function setPassword($password) {
        $this->password = $password;
    }
    
    
    /**
     * @return string ti get the value of password
     */
    public function getPassword() {
        return $this->password;
    }
    
    
    /**
     * @param numeric $type to set the value of type
     */
    public function setType($type) {
        $this->type = $type;
    }
    
    
    /**
     * @return numeric to get the value of type
     */
    public function getType() {
        return $this->type;
    }

    
    /**
     * @return boolean if true means can login, false means can`t login
     */
    public function performLogIn() {
        $param1 = $this->getName();
        $param2= $this->getPassword();
        $val = '';
        if (strpos($param1, '@') !== false) {
            $this->loginObject = new emailLoginClass();
            $val = $this->loginObject->login($param1, $param2);
        } else {
            $this->loginObject = new userNameLoginClass();
            $val = $this->loginObject->login($param1, $param2);
        }
        if ($val) {
            $_SESSION['username'] = $val[0];
            $_SESSION['type'] = $val[1];
            return true;
        }
        return false;
    }

    
    /**
     * @return object containing list of users
     */
    public function listUsers() {
        return $result = $this->userModelObject->listUsers();
    }

    
    /**
     * 
     * @return boolean if true means user added succssfully ,false means not added
     */
    public function addUser() {
        $name = $this->getName();
        $email=$this->getEmail();
        return $result = $this->userModelObject->addUser($name, $email);
    }

}
