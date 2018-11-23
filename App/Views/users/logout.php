<?php
require_once '../../../googlefiles/config.php';
unset($_SESSION['access_token']);
$gClient->revokeToken();
header('Location:index.php');
exit();