<?php

if (isset($_GET['id'])) {

    require_once '../../Controllers/adsController.php';
    $adsControllerObject = new adsController();
    $adsControllerObject->setAdId($_GET['id']);
    $result = $adsControllerObject->deleteAds();
    if ($result) {
        header('Location:listAds.php');
    } else {
        echo '<dic class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">';
            echo '<div class="alert alert-danger">Failed to delete</div>';
        echo '</div>';
    }
}