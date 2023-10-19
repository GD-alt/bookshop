<div class="header">
    <div class="header__logo">
        <i class="fi fi-sr-book-open-cover"></i> Очень книжный!
    </div>
    <div class="header__menu">
        <ul>
            <li><a href="index.php">Главная</a></li>
            <?php
                if (isset($_SESSION['user_id'])) {
                    echo '<li><a href="profile.php">Профиль</a></li>';
                    echo '<li><a href="logout.php">Выйти</a></li>';
                    echo '<li>(вы вошли как ' . $_SESSION['real_name'] .')</li>';
                } else {
                    echo '<li><a href="login.php">Войти</a></li>';
                    echo '<li><a href="register.php">Регистрация</a></li>';
                }
            ?>
        </ul>
    </div>
</div>