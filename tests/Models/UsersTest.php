<?php

require_once 'C:\xampp\htdocs\YellowAssignment\App\Models\Users.php';

/**
 * This is Users Test class to perform testing on Model(Users) methods
 * @author Mohab
 */
class UsersTest extends PHPUnit_Framework_TestCase {

    /**
     * @var object to get object from model(Comments)
     */
    public $users = null;

    public function __construct() {
        $this->users = new Users();
    }

    public function testListUsersReturnsObject() {
        $this->assertTrue(is_object($this->users->listUsers()));
    }

    public function testAddUserReturnsTrue() {
        $this->assertTrue($this->users->addUser('test', 'test@test.test'));
    }

}
