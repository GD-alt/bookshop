<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/registration.css">
</head>
<body>
    <?php
        include 'header.php';
    ?>

    <div class="content">
        <h1>Регистрация</h1>
        <form action="registrationCompletion.php" method="post">
            <label>
                <input type="text" name="real_name" placeholder="Полное имя" required>
            </label><br>
            <label>
                <input type="text" name="login" placeholder="Логин" required>
            </label><br>
            <label>
                <input type="password" name="password" placeholder="Пароль" required>
            </label><br>
            <label>
                <input type="password" name="password2" placeholder="Повторите пароль" required>
            </label><br>
            <input type="submit" value="Зарегистрироваться">
        </form>
    </div>

    <?php
        include 'footer.php';
    ?>
</body>
</html>
