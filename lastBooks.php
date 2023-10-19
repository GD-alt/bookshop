<?php
    $connection = mysqli_connect('localhost', 'root', '', 'bookshop');

    // Check connection
    if (!$connection) {
        die(). "Connection failed: " . mysqli_connect_error();
    }

    // Fetch last five books
    $sql = "SELECT * FROM books ORDER BY book_id DESC LIMIT 4";

    $result = mysqli_query($connection, $sql);

    foreach ($result as $book) {
        if ($book['image'] != '') {
            $book['image'] = '<img src="' . $book['image'] . '" alt="' . $book['name'] . '">';
        }
        else {
            $book['image'] = '<img src="https://htmlcolorcodes.com/assets/images/colors/bright-blue-color-solid-background-1920x1080.png" alt="' . $book['name'] . '">';
        }
        echo '<div class="book">
            ' . $book['image'] . '
            <div class="book__info">
                <h1>' . $book['name'] . '</h1>
                <p><b>Автор:</b> ' . $book['author'] . '</p>
                <p><b>Год:</b> ' . $book['year'] . '</p>
            </div>
            <div class="book__buttons">
            <button disabled><a href=""><i class="fi fi-sr-shopping-cart"></i> ' . $book['price'] .'₽</a></button>
            <button><a href="book.php?book_id=' . $book['book_id'] . '"><i class="fi fi-sr-info"></i> Подробнее</a></button></div>
        </div>';
    }