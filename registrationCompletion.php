<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/float.css">
</head>
<body>
<div class="float">
    <?php
    $data = $_POST;

    if (!$data) {
        echo '<h1>Как вы сюда попали?</h1>';
        echo '<p>Возвращение через три секунды…</p>';
        echo '<div class="logo"><i class="fi fi-sr-book-open-cover"></i> Очень книжный!</div>';
        header('Refresh: 3; URL=register.php');
        exit();
    }

    // Connect to database
    $connection = mysqli_connect('localhost', 'root', '', 'bookshop');

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if user exists
    $sql = "SELECT * FROM users WHERE login = '" . $data['login'] . "'";

    $result = mysqli_query($connection, $sql);

    // If exists, then show error
    if (mysqli_num_rows($result) > 0) {
        echo '<h1>Пользователь с таким логином уже существует!</h1>';
        echo '<p>Возвращение через восемь секунд…</p>';
        echo '<p>Возможно, вы хотели <a href="login.php">войти</a>?</p>';
        echo '<div class="logo"><i class="fi fi-sr-book-open-cover"></i> Очень книжный!</div>';
        header('Refresh: 8; URL=register.php');
    } else {
        // If not exists, then register user
        $sql = "INSERT INTO users (real_name, login, password_hash) VALUES ('" . $data['real_name'] . "', '" . $data['login'] . "', '" . md5($data['password']) . "')";

        if (mysqli_query($connection, $sql)) {
            echo '<h1>Пользователь успешно зарегистрирован!</h1>';
            echo '<p>Возвращение через три секунды…</p>';
            echo '<div class="logo"><i class="fi fi-sr-book-open-cover"></i> Очень книжный!</div>';
            header('Refresh: 3; URL=login.php');
        } else {
            echo '<h1>Произошла ошибка при регистрации!</h1>';
            echo '<p>Возвращение через три секунды…</p>';
            echo '<div class="logo"><i class="fi fi-sr-book-open-cover"></i> Очень книжный!</div>';
            header('Refresh: 3; URL=register.php');
        }
    }
    ?>
</div>
</body>
</html>
