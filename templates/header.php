<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Объявления.ру</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <nav>
            <ul>
            <?php if (!isset($_SESSION['username'])): ?>
                    <div>
                    <li><a href="login.php">Войти</a></li>
                    </div>
                    <?php endif; ?>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="post_ad.php">Добавить объявление</a></li>
                    <li><a href="ads.php">Все объявления</a></li>
            <?php endif; ?>
                    <li><a href="register.php">Зарегестрироваться</a></li>
                 
                </ul>
            </nav>
           
        </div>
    </header>
