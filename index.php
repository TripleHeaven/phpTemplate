<?php
require_once 'includes/utils.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
    header("Location: ads.php");
    exit();
?>