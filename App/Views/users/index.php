<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Main Page</title>
        <link rel="stylesheet" href="../../../Public/css/bootstrap.min.css">
    </head>
    <body>
        <?php
        require_once '../../Controllers/adsController.php';
        $adsControllerObject = new adsController();
        $result = $adsControllerObject->listAds();
        if ($result == null) {
            ?>
            <div class="alert alert-danger" role="alert">There is no Advertisements </div>
            <?php
        } else {
            ?>
            <div class="container" style="margin-top: 50px;">
                <div class="row">
                    <?php
                    foreach ($result as $val) {
                        ?>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <a href=<?php echo 'singleAd.php?id=' . $val['id']; ?>><img src=<?php echo '../../../Public/images/' . $val['image'] ?>></a>
                                <div class="caption">
                                    <p><?php echo $val['description'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>

        <script src="../../../Public/js/bootstrap.min.js"></script>

    </body>
</html>
