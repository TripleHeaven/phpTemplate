<?php
require_once 'includes/utils.php';

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $errors = [];

    if (empty($username)) {
        $errors[] = "Username is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    if (empty($errors)) {
        if ($user = authenticate_user($username, $password)) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION[' '] = $user['username'];
            header("Location: ads.php");
            exit();
        } else {
            $errors[] = "Invalid username or password";
        }
    }
}

require_once 'templates/header.php';
?>

<main>
    <div class="container">
        <h1>Авторизация</h1>
        <form action="login.php" method="post">
            <label for="username">Логин</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" required>

            <input type="submit" value="Login">
        </form>
        <div style="display:flex">
        <a href="register.php" style="margin-left:auto; margin-right: auto;">Перейти к регистрации</a>
        </div style="display:flex">
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
