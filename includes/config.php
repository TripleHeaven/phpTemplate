<?php
try {
    $mysqli = new mysqli("localhost", "tester_user", "123", "cool_app_bd");
} catch (mysqli_sql_exception $e) {
    error_log('что-то пошло не так');
}
?>
