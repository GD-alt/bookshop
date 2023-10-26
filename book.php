<?php
    $book_id = $_GET['book_id'];
    $connection = mysqli_connect('localhost', 'root', '', 'bookshop');

    // Check connection
    if (!$connection) {
        die(). "Connection failed: " . mysqli_connect_error();
    }

    // Fetch book
    $sql = "SELECT * FROM books WHERE book_id = $book_id";

    $result = mysqli_query($connection, $sql);

    $book = mysqli_fetch_assoc($result);

    // If book not found
    if (!$book) {
        // Open 404 page on the same URL as user entered
        $file = fopen('404.php', 'r');

        while (!feof($file)) {
            echo fgets($file);
        }

        fclose($file);
        exit();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Очень книжный</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bookpage.css">
</head>
<body>
<?php
include 'header.php';
?>
<div class="grid-content">
    <div class="book__picture">

        <?php
        if ($book['image'] != '') {
            $book['image'] = '<img src="' . $book['image'] . '" alt="' . $book['name'] . '">';
        }
        else {
            $book['image'] = '<img src="https://htmlcolorcodes.com/assets/images/colors/bright-blue-color-solid-background-1920x1080.png" alt="' . $book['name'] . '">';
        }
        echo $book['image'];
        ?>
        <div class="book__buttons">
            <?php
            $classInjection = '';
            $priceInjection = '<i class="fi fi-sr-shopping-cart"></i>' . $book['price'] .'₽';
            if ($book['quantity'] == 0) {
                $classInjection = 'class="ran-out"';
                $priceInjection = '<i class="fi fi-sr-ban"></i> Нет в нал.';
            }

            echo '<button disabled '. $classInjection .'>' . $priceInjection .'</button>
            <button>На складе: ' . $book['quantity'] . '</button></div>';
            ?>
        </div>

        <div class="book__data">
            <h1><?php echo $book['name']; ?></h1>
            <ul>
                <li><b>Автор:</b> <?php echo $book['author']; ?></li>
                <li><b>Год:</b> <?php echo $book['year']; ?></li>
            </ul>
            <p><?php echo $book['description']; ?></p>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
</body>
</html>