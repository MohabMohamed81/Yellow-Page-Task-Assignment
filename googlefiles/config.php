<?php
    session_start();
    require_once 'C:/xampp/htdocs/YellowAssignment/GoogleAPI/vendor/autoload.php';
    $gClient = new Google_Client();
    $gClient->setClientId("1003100432418-pg84d0fvrhg0lq772qdc3tngguf0ao27.apps.googleusercontent.com");
    $gClient->setClientSecret("sYVmrAtlXxSJfNJVjiM9iSm9");
    $gClient->setApplicationName("Yellow Assignment");
    $gClient->setRedirectUri("http://localhost/YellowAssignment/googlefiles/g-callback.php");
    $scope_or_scopes="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email";
    $gClient->addScope($scope_or_scopes);
?>