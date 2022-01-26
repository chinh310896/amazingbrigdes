<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    delete_image($_POST['id']);
    $bridgeID = $_POST['bridgeID'];
    redirect_to("view.php?id=$bridgeID");
} ?>