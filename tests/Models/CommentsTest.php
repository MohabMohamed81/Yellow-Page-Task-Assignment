<?php

require_once 'C:\xampp\htdocs\YellowAssignment\App\Models\Comments.php';

/**
 * This is Comments Test class to perform testing on Model(Comments) methods
 * @author Mohab
 */
class CommentsTest extends PHPUnit_Framework_TestCase {

    /**
     * @var object to get object from model(Comments)
     */
    public $comment = null;

    public function __construct() {
        $this->comment = new Comments();
    }

    public function testListUpApprovedCommentReturnsObject() {
        $this->assertTrue(is_object($this->comment->listUpApprovedComment()));
    }

    public function testValidDeleteComment() {
        $this->assertTrue($this->comment->deleteComment(10));
    }

    public function testValidApproveComment() {
        $this->assertTrue($this->comment->approveComment(10));
    }

    public function testValidPostComment() {
        $this->assertTrue($this->comment->postComment('comment from test', 'Mohab Mohammed', 1));
    }

}
