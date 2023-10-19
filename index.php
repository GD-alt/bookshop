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
    <div class="content__cover">
        <h1>Добро пожаловать на сайт сети магазинов «Очень книжный!»</h1>
            <form action="search.php" method="get">
                <div class="searchbar">
                <label>
                    <input type="text" name="bookSearch" placeholder="Найти книгу">
                </label>
                <button type="submit"><i class="fi fi-sr-search"></i></button>
                </div>
            </form>
    </div>
    <div class="content">
        <h1>Последние поступления</h1>
        <div class="books">
        <?php include 'lastBooks.php';?>
        </div>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>
