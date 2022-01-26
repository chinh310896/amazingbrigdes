<?php
require_once('../lib/database.php');
require_once('../lib/initialize.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    delete_category($_POST['id']);
    redirect_to('indexCategory.php');
} ?>