<footer>
        <div class="container">
            <ul>
                <li>
                    <?php if (isset($_SESSION['username'])): ?>
                    <div class="user-info">
                        <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    </div>
                    <?php endif; ?>
                </li>
                <?php if (isset($_SESSION['username'])): ?>
                    <div class="user-info">
                    <li><a href="logout.php">Выйти</a></li>
                    </div>
                    <?php endif; ?>
            </ul>
        </div>
    </footer>
</body>
</html>
