<?php
require_once('../lib/initialize.php');
if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
     $days = 30;
     setcookie ("rememberme","", time() - ($days * 24 * 60 * 60 * 1000));
}

redirect_to('login.php');
?>