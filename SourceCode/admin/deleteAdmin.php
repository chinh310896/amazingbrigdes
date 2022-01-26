<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    $deleted_admin = find_admin_by_id($_POST['id']);
    delete_admin($_POST['id']);
    if($_SESSION['user'] == $deleted_admin['adminName']){
        redirect_to('logout.php');
    }
    redirect_to('indexAdmin.php');
}

db_disconnect($db);
?>