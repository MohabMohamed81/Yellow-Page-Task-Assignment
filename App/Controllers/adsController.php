<?php

require_once 'C:\xampp\htdocs\YellowAssignment\App\Models\Ads.php';

/**
 * This is Advertisement Controller which have the methods related to advertisements
 * @author Mohab
 */
class adsController {

    /**
     * @var object create object from advertisemnt model
     * @var string to set and get value of image
     * @var string to set and gat value of description
     * @var numeric to set and get value of advertisemnt id
     */
    private $adsModelObject = null;
    private $image;
    private $description;
    private $ad_id;

    
    
    public function __construct() {
        $this->adsModelObject = new Ads();
    }

    
    /**
     * @param string $image set value of image
     */
    public function setImage($image) {
        $this->image = $image;
    }
    
    
    /**
     * @return string value of image
     */
    public function getImage() {
        return $this->image;
    }
    
    
    /**
     * @param string $description set value of description
     */
    public function setDescription($description) {
        $this->description = $description;
    }
    
    
    /**
     * @return string value of description
     */
    public function getDescription() {
        return $this->description;
    }
    
    /**
     * @param numeric $ad_id set value of advertisemnt id
     */
    public function setAdId($ad_id) {
        $this->ad_id = $ad_id;
    }
    
    /**
     * @return numeric value of advertisemnt id
     */
    public function getAdId() {
        return $this->ad_id;
    }
    
    
    /**
     * @return object containing list of advertisement
     */
    public function listAds() {
        return $result = $this->adsModelObject->listAds();
    }

    
    /**
     * @return object containing values of single advertisement
     */
    public function listSingleAd() {
        $id=$this->getAdId();
        return $reslut = $this->adsModelObject->listSingleAd($id);
    }


    /**
     * @return Boolean if true the advertisement inserted, false mean not inserted
     */
    public function addAds() {
        $image = $this->getImage();
        $description = $this->getDescription();
        return $this->adsModelObject->addAds($image, $description);
    }
    
    
     /**
     * @return Boolean if true the advertisement deleted, false mean not deleted
     */
    public function deleteAds() {
        $id = $this->getAdId();
        return $this->adsModelObject->deleteAds($id);
    }

    
     /**
     * @return Boolean if true the advertisement updated, false mean not updated
     */
    public function updateAds() {
        $id=$this->getAdId();
        $image=$this->getImage();
        $description=$this->getDescription();
        return $this->adsModelObject->updateAds($id, $image, $description);
    }
    
}