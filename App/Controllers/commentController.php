<?php

require_once 'C:\xampp\htdocs\YellowAssignment\App\Models\Comments.php';

/**
 * This is Comment Controller which have the methods related to comments
 * @author Mohab
 */
class commentController {

    /**
     * @var object create object from comment model
     * @var numeric to set and get id of comment
     * @var string to set and gat value of comment
     * @var numeric to set and get id of user
     * @var numeric to set and get id of advertisement
     */
    private $commentObjectModel = null;
    private $comment_id;
    private $comment;
    private $user_id;
    private $ads_id;

    public function __construct() {
        $this->commentObjectModel = new Comments();
    }

    /**
     * @param numeric $comment_id to set id of comment 
     */
    public function setCommentId($comment_id) {
        $this->comment_id = $comment_id;
    }

    
    /**
     * @return numeric the id of comment
     */
    public function getCommentId() {
        return $this->comment_id;
    }

  
    /**
     * @param string $comment to set value of comment
     */
    public function setComment($comment) {
        $this->comment = $comment;
    }

    
    /**
     * @return string the value of comment
     */
    public function getComment() {
        return $this->comment;
    }

    
    /**
     * @param numeric $user_id to set id of user
     */
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    
    /**
     * @return numeric to get the id of user
     */
    public function getUserId() {
        return $this->user_id;
    }

    
    /**
     * @param numeric $ads_id to set id of advertisement
     */
    public function setAdsId($ads_id) {
        $this->ads_id = $ads_id;
    }

    
    /**
     * @return numeric to get id of advertisement
     */
    public function getAdsId() {
        return $this->ads_id;
    }

    
    /** 
     * @return object containing comments for specific advertisement
     */
    public function listComments() {
        $id = $this->getAdsId();
        return $result = $this->commentObjectModel->listComments($id);
    }

    
    /**
     * @return object containing list of un approved comments
     */
    public function listUpApprovedComment() {
        return $this->commentObjectModel->listUpApprovedComment();
    }

    
    /**
     * @return Boolean if true means he comment is delete, if false means not deleted
     */
    public function deleteComment() {
        $id = $this->getCommentId();
        return $this->commentObjectModel->deleteComment($id);
    }

    
    /**
     * @return Boolean if true means he comment is approved, if false means not approved
     */
    public function approveComment() {
        $id = $this->getCommentId();
        return $this->commentObjectModel->approveComment($id);
    }

    
    /**
     * @return Boolean if true means he comment is posted, if false means not posted
     */
    public function postComment() {
        $comment = $this->getComment();
        $userName = $this->getUserId();
        $adsId = $this->getAdsId();
        return $this->commentObjectModel->postComment($comment, $userName, $adsId);
    }

}
