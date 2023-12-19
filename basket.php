<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Очень книжный</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/basket.css">
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <script>
        function removeItem(id) {
            let url = 'api/basket.php';
            let formData = new FormData();

            formData.append('book_id', id);

            fetch(url, {
                method: 'DELETE',
                body: formData
            })
                .then(response => {
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        alert('Книга удалена из корзины');
                        window.location.reload();
                    }
                })
        }
    </script>
    <div class="content">
        <h1>Корзина</h1>
        <div class="books">
            <?php
            $connection = mysqli_connect('localhost', 'root', '', 'bookshop');

            // Check connection
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM basket WHERE user_id = " . $_SESSION['user_id'];

            $result = mysqli_query($connection, $sql);

            if (mysqli_num_rows($result) == 0) {
                echo '<h2>Ваша корзина пуста!</h2>';
            }

            $books = array();

            foreach ($result as $book) {
                $res = mysqli_query($connection, "SELECT * FROM books WHERE book_id = " . $book['book_id']);

                if (mysqli_num_rows($res) > 0) {
                    $books[] = mysqli_fetch_assoc($res);
                }
            }
            $total = 0;

            foreach ($books as $book) {
                $total += $book['price'];
                echo '<div class="book-card">
                    <img src="' . $book['image'] . '" alt="' . $book['name'] . '">
                    <h1>' . $book['name'] . '</h1>
                    <div class="sub">
                        <div class="price">
                            <p>' . $book['price'] . '₽</p>
                        </div>
                        <div class="book__buttons">
                            <button><a href="book.php?book_id=' . $book['book_id'] . '"><i class="fi fi-sr-info"></i></a></button>
                            <button><a onclick="removeItem(' . $book['book_id'] . ')"><i class="fi fi-sr-trash"></i></a></button>
                        </div>
                    </div>
                </div>';
            }
            echo '<div class="total">
            <h1>Итого:'. $total. '</h1>
        </div></div>';
            ?>
    </div>
    <?php
        include 'footer.php';
    ?>
</body>
</html>
