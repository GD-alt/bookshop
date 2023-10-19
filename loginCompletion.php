<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход</title>
    <link rel="stylesheet" href="css/float.css">
</head>
<body>
<div class="float">
    <?php
    $data = $_POST;
    session_start();

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

    // Check if user exists and password is correct
    $sql = "SELECT * FROM users WHERE login = '" . $data['login'] . "' AND password_hash = '" . md5($data['password']) . "'";

    $result = mysqli_query($connection, $sql);

    // If not exists, then show error
    if (mysqli_num_rows($result) == 0) {
        echo '<h1>Неверный логин или пароль!</h1>';
        echo '<p>Возвращение через восемь секунд…</p>';
        echo '<p>Возможно, вы хотели <a href="register.php">зарегистрироваться</a>?</p>';
        echo '<div class="logo"><i class="fi fi-sr-book-open-cover"></i> Очень книжный!</div>';
        header('Refresh: 8; URL=login.php');
    } else {
        // If exists, then login user
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['real_name'] = $user['real_name'];
        $_SESSION['login'] = $user['login'];
        echo '<h1>Вы успешно вошли!</h1>';
        echo '<p>Возвращение через три секунды…</p>';
        echo '<div class="logo"><i class="fi fi-sr-book-open-cover"></i> Очень книжный!</div>';
        header('Refresh: 3; URL=index.php');
    }
    ?>
</div>
</body>
</html>

