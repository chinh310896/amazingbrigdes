<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    set_thumbnail($_POST['bridgeID'],$_POST['imageID']);
    redirect_to('view.php?id=' . $_POST['bridgeID']);
} ?>