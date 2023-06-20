<?php
require_once 'includes/utils.php';

if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    session_destroy();
}

header("Location: login.php");
exit();
?>
