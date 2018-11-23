<?php

require_once 'C:\xampp\htdocs\YellowAssignment\config.php';

/**
 * This is Comment Model which have the methods related to comments and interact with database
 * @author Mohab
 */
class Comments {

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
     * @return object containing list of un approved comments
     */
    public function listUpApprovedComment() {
        $query = "SELECT `id`, `comment`, `created_at` FROM `comments` WHERE `status` = 0";
        $result = mysqli_query($this->val, $query);
        if (!$result || mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    /**
     * @return Boolean if true means he comment is delete, if false means not deleted
     */
    public function deleteComment($id) {
        $query = "DELETE FROM `comments` WHERE `id` = " . $id;
        $result = mysqli_query($this->val, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return Boolean if true means he comment is approved, if false means not approved
     */
    public function approveComment($id) {
        $query = "UPDATE `comments` SET `status`= 1 WHERE `id` = " . $id;
        $result = mysqli_query($this->val, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return Boolean if true means he comment is posted, if false means not posted
     */
    public function postComment($comment, $userName, $postId) {
        $id = '';
        $getIdQuery = "SELECT `id` FROM `users` WHERE `name` = '" . $userName . "'";
        $getIdResult = mysqli_query($this->val, $getIdQuery);
        if (!$getIdResult || mysqli_num_rows($getIdResult) > 0) {
            $query_val = mysqli_fetch_assoc($getIdResult);
            $id = $query_val['id'];
        }
        $query = "INSERT INTO `comments`(`comment`, `status`, `user_id`, `ads_id`) VALUES ('" . $comment . "',0," . $id . "," . $postId . ")";
        $result = mysqli_query($this->val, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return object containing comments for specific advertisement
     */
    public function listComments($check) {
        $query = "SELECT comments.comment, comments.created_at, users.name FROM comments INNER JOIN users ON comments.user_id=users.id INNER JOIN ads ON comments.ads_id= ads.id WHERE ads.id = " . $check . " AND comments.status = 1";
        $result = mysqli_query($this->val, $query);
        if (!$result || mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

}
