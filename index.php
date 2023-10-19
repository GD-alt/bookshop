<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Очень книжный</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <?php
        // Output all session elements
        echo '<pre>';
            session_start();
            print_r($_SESSION);
        echo '</pre>';
    ?>
    <?php
        include 'footer.php';
    ?>
</body>
</html>
