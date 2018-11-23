<?php
session_start();
if(isset($_SESSION['username'])){
require_once '../../Controllers/adsController.php';
if (isset($_POST['submit']) && isset($_FILES['image']) && isset($_POST['description'])) {
    $adsControllerObject = new adsController();
    $target = "../../../Public/images/" . basename($_FILES['image']['name']);
    $adsControllerObject->setImage($_FILES['image']['name']);
    $adsControllerObject->setDescription($_POST['description']);
    $result = $adsControllerObject->addAds();
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg1 = "Uploded success";
    } else {
        $msg1 = "Failed";
    }
    if ($result) {
        echo '<dic class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">';
            echo '<div class="alert alert-success">Added Successfully</div>';
        echo '</div>';
    } else {
        echo '<dic class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">';
            echo '<div class="alert alert-danger">Failed</div>';
        echo '</div>';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add New Advertise</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">
        <link rel="stylesheet" href="../../../Public/css/bootstrap.min.css">
        <link href="../../../Public/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../../Public/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="../../../Public/css/dashboard.css" rel="stylesheet">
        <script src="../../../Public/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Yellow Assignment</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="listUsers.php">Users</a></li>
                        <li><a href="listAds.php">Advertisements</a></li>
                        <li><a href="listComments.php">Comments</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="listUsers.php">Users</a></li>
                        <li><a href="listAds.php">Advertisements</a></li>
                        <li><a href="listComments.php">Comments</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main ">

            <h1 class="display-1">Add New Advertise</h1>  

            <form action="addAds.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputFile">Upload Image</label>
                    <input name="image" type="file" id="exampleInputFile" required>
                </div>

                <div class="form-group">
                    <label for="exampleInputDescription">Description</label>
                    <input name="description" type="text" class="form-control" id="exampleInputDescription" placeholder="Description" required>
                </div>

                <button name="submit" type="submit" class="btn btn-primary">Add</button>
            </form>

        </div>

                <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../../../Public/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="../../../Public/js/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../../Public/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
<?php } else {
    header('Location:login.php');
} ?>