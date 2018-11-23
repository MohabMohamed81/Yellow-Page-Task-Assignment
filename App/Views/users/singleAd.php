<?php
require_once '../../../googlefiles/config.php';
if (isset($_GET['id'])) {
    $_SESSION['important_id'] = $_GET['id'];
    require_once '../../Controllers/adsController.php';
    $adsControlletObject = new adsController();
    $adsControlletObject->setAdId($_GET['id']);
    $result = $adsControlletObject->listSingleAd();
    $query_row = mysqli_fetch_assoc($result);
    $adsImage = $query_row['image'];
    $adsDescription = $query_row['description'];
} else {
    header("Location:singleAd.php?id=" . $_SESSION['important_id']);
    exit();
}
if (isset($_POST['submit']) && isset($_POST['comment'])) {
    require_once '../../Controllers/commentController.php';
    $commentControlletObject = new commentController();
    $commentControlletObject->setComment($_POST['comment']);
    $commentControlletObject->setUserId($_SESSION['name']);
    $commentControlletObject->setAdsId($_SESSION['important_id']);
    $result = $commentControlletObject->postComment();
    if ($result) {
        header("Location:singleAd.php?id=" . $_SESSION['important_id']);
        exit();
    } else {
        echo '<dic class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">';
        echo '<div class="alert alert-danger">Comment Failed</div>';
        echo '</div>';
    }
}



$loginURL = $gClient->createAuthUrl();
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Advertisement Page</title>
        <link rel="stylesheet" href="../../../Public/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../Public/css/style.css">
    </head>
    <body>
        <div class="container" style="margin-top: 50px;">
            <ul class="nav nav-pills">
                <li role="presentation" class="active"><a href="index.php">Home</a></li>
                <?php
                if (isset($_SESSION['access_token'])) {
                    ?>
                    <li role="presentation" class="active"><a href="logout.php">Logout</a></li>
                <?php }
                ?>
            </ul>
            <hr>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="thumbnail text-center">
                        <img class="logo" src=<?php echo '../../../Public/images/' . $adsImage ?>>
                        <div class="caption">
                            <p><?php echo $adsDescription; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            require_once '../../Controllers/commentController.php';
            $commentControlletObject = new commentController();
            $commentControlletObject->setAdsId($_GET['id']);
            $result = $commentControlletObject->listComments();
            if ($result == null) {
                echo '<div class="alert alert-danger">There is no Comments</div>';
            } else if (!$result || mysqli_num_rows($result) > 0) {
                foreach ($result as $val) {
                    ?>
                    <div class="jumbotron">
                        <span class="pull-left"><?php echo $val['name']; ?></span>
                        <span class="pull-right"><?php echo $val['created_at']; ?></span>
                        <div class="clearfix"></div>
                        <p class="text-center"><?php echo $val['comment']; ?></p>
                    </div>
                    <?php
                }
            }
            ?>

            <?php
            if (!isset($_SESSION['access_token'])) {
                ?>
                <div class="jumbotron">
                    <form>
                        <input type="button" class="btn btn-danger center-block" value="Login With Google" onclick="window.location = '<?php echo $loginURL ?>';">
                        <p class="text-center">You Must Login With Google Account to Comment</p>
                    </form>
                </div>
                <?php
            }
            if (isset($_SESSION['access_token'])) {
                ?>

                <div class="jumbotron">
                    <div class="container">

                        <h1 class="display-1">Comment Section</h1>  

                        <form method="POST"  action=<?php echo 'singleAd.php?id=' . $_SESSION['important_id']; ?>>
                            <div class="form-group">
                                <label for="exampleInputComment">Enter Comment</label>
                                <input name="comment" type="text" class="form-control" id="exampleInputComment" placeholder="Leave Comment" required>
                            </div>

                            <button name="submit" type="submit" class="btn btn-primary">Post Comment</button>
                        </form>

                    </div>
                </div>
            <?php } ?>




        </div>
        <script src="../../../Public/js/bootstrap.min.js"></script>
    </body>
</html>
