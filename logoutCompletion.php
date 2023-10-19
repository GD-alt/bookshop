<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Выход</title>
    <link rel="stylesheet" href="css/float.css">
</head>
<body>
<div class="float">
    <?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        $_SESSION = [];
        session_destroy();
        echo '<h1>Вы успешно вышли!</h1>';
    }
    else {
        echo '<h1>Сессия не найдена!</h1>';
    }
    echo '<p>Возвращение через три секунды…</p>';
    echo '<div class="logo"><i class="fi fi-sr-book-open-cover"></i> Очень книжный!</div>';
    header('Refresh: 3; URL=login.php');
    ?>
</div>
</body>
</html>
