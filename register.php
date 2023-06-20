<?php
require_once 'includes/utils.php';
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $password_confirm = trim($_POST['password_confirm']);
    $errors = [];
    $error = false;

    if (empty($errors)) {
        $result = register_user($username, $email, $password);
        error_log('Registered');
        if ($result === true) {
            error_log('reg ok');

            header("Location: ads.php");
            exit();
        } else {
            $error = $result;

        }

    }
}

require_once 'templates/header.php';
?>

<main>
    <div class="container">
        <h1>Регистрация</h1>
        <form action="register.php" method="post">
            <label for="username">Логин</label>
            <input type="text" name="username" id="username" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" minlength="6" required>

            <label for="password_confirm">Повторите пароль</label>
            <input type="password" name="password_confirm" id="password_confirm" minlength="6" required>

            <input type="submit" value="Register">
        </form>

        <?php

if (!empty($errors)) {
    echo "<ul class='errors'>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
}
        ?>
    </div>
</main>

<?php require_once 'templates/footer.php'; ?>
