<?php

require_once 'C:\xampp\htdocs\YellowAssignment\config.php';

/**
 * This is Advertisement Model which have the methods related to advertisements and interact with database
 * @author Mohab
 */
class Ads {

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
     * @return object containing list of advertisement
     */
    public function listAds() {
        $query = "SELECT * FROM `ads`";
        $result = mysqli_query($this->val, $query);
        if (!$result || mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    /**
     * @return object containing values of single advertisement
     */
    public function listSingleAd($check) {
        $query = "SELECT * FROM `ads` WHERE `id` = " . $check;
        $result = mysqli_query($this->val, $query);
        if (!$result || mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    /**
     * @return Boolean if true the advertisement inserted, false mean not inserted
     */
    public function addAds($image, $description) {
        $query = "INSERT INTO `ads`(`image`, `description`) VALUES ('" . $image . "','" . $description . "')";
        $result = mysqli_query($this->val, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return Boolean if true the advertisement deleted, false mean not deleted
     */
    public function deleteAds($id) {
        $query = "DELETE FROM `ads` WHERE `id` = " . $id;
        $result = mysqli_query($this->val, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return Boolean if true the advertisement updated, false mean not updated
     */
    public function updateAds($id, $image, $description) {
        $query = 'UPDATE `ads` SET `image`="' . $image . '",`description`="' . $description . '" WHERE `id` = ' . $id;
        echo $query;
        $result = mysqli_query($this->val, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}
