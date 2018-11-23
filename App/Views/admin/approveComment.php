<?php

if (isset($_GET['id'])) {

    require_once '../../Controllers/commentController.php';
    $commentControllerObject = new commentController();
    $commentControllerObject->setCommentId($_GET['id']);
    $result = $commentControllerObject->approveComment();
    if ($result) {
        header('Location:listComments.php');
    } else {
        echo '<dic class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">';
        echo '<div class="alert alert-danger">Failed to approve</div>';
        echo '</div>';
    }
}