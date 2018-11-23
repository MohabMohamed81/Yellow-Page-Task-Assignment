<?php
include_once '../../Controllers/userController.php';

if(isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password'])){
    $userControllerObject = new userController();
    $userControllerObject->setName($_POST['username']);
    $userControllerObject->setPassword($_POST['password']);
    $check = $userControllerObject->performLogIn();
    if($check){
    header('Location:dashboard.php');
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="../../../Public/css/bootstrap.min.css">
    </head>
    <body>

          
        <div class="container">
            
            <h1 class="display-1">Admin Layer</h1>  
            
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Or Username</label>
                    <input name="username" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email or username" required>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                </div>
                
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
            </form>

        </div>


        <script src="../../../Public/js/bootstrap.min"></script>
    </body>
</html>

