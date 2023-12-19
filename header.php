<div class="header">
    <div class="header__logo">
        <i class="fi fi-sr-book-open-cover"></i> Очень книжный!
    </div>
    <div class="header__menu">
        <ul>
            <li><a href="index.php">Главная</a></li>
            <?php
                session_start();

                if (isset($_SESSION['user_id'])) {
                    echo '<li><a href="logoutCompletion.php">Выйти</a></li>';
                    echo '<li>(вы вошли как ' . $_SESSION['real_name'] .')</li>';
                    echo '<li><a href="basket.php" id="basket-item">Корзина ()</a></li>';
                } else {
                    echo '<li><a href="login.php">Войти</a></li>';
                    echo '<li><a href="register.php">Регистрация</a></li>';
                }
            ?>
        </ul>
    </div>
    <script>
        // On load
        window.onload = function() {
            // If there's no element with id basket-item, return
            if (!document.getElementById('basket-item')) {
                return;
            }

            // Set value of that element to number of items in basket
            let url = 'api/basket.php';
            fetch(url)
                .then(response => {
                    return response.json();
                })
                .then(data => {
                    document.getElementById('basket-item').innerHTML = 'Корзина (' + data.length + ')';
                })
        }
    </script>
</div>