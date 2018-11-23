<?php

require_once 'C:\xampp\htdocs\YellowAssignment\App\Models\Ads.php';

/**
 * This is Ads Test class to perform testing on Model(Ads) methods
 * @author Mohab
 */
class AdsTest extends PHPUnit_Framework_TestCase {

    /**
     * @var object to get object from model(Ads)
     */
    public $ads = null;

    public function __construct() {
        $this->ads = new Ads();
    }
    
    
    public function testListAdsReturnsObject(){
        $this->assertTrue(is_object($this->ads->listAds()));
    }
    
    
    public function testAddAdsReturnsTrue(){
        $this->assertTrue($this->ads->addAds('yellow1.gif', 'desc from test'));
    }
    

    public function testDeleteAdsReturnsTrue(){
        $this->assertTrue($this->ads->deleteAds(10));
    }
    
    public function testUpdateAdsReturnsTrue(){
        $this->assertTrue($this->ads->updateAds(10,'yellow1.gif','desc from test'));
    }
}
