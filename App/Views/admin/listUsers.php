<?php
    session_start();

if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Users</title>

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
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Users List</h1>

                    <?php
                    require_once '../../Controllers/userController.php';
                    $userControllerObj = new userController();
                    $result = $userControllerObj->listUsers();
                    if ($result == null) {
                        ?>
                        <div class="alert alert-danger" role="alert">There is no Users</div>
                        <?php
                    }
                    ?>


                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result != null) {
                                    foreach ($result as $val) {
                                        ?>
                                        <tr>
                                            <td><?php echo $val['id']; ?></td>
                                            <td><?php echo $val['name']; ?></td>
                                            <td><?php echo $val['email']; ?></td>
                                            <?php
                                            if ($val['type'] == 0) {
                                                echo '<td>Admin</td>';
                                            } else if ($val['type'] == 1) {
                                                echo '<td>Editor</td>';
                                            } else {
                                                echo '<td>User</td>';
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
