<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $book = $_POST['book'];

    $sql = "INSERT INTO basket (user_id, book_id) VALUES (" . $_SESSION['user_id'] . ", $book)";

    // Connect to database
    $connection = mysqli_connect('localhost', 'root', '', 'bookshop');

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_query($connection, $sql);

    mysqli_close($connection);

    // Return JSON with success
    echo json_encode(['success' => true]);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Connect to database
    $connection = mysqli_connect('localhost', 'root', '', 'bookshop');

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM basket WHERE user_id = " . $_SESSION['user_id'];

    $result = mysqli_query($connection, $sql);

    $books = [];

    while ($row = mysqli_fetch_assoc($result)) {
        // Append book ID to array
        $books[] = $row['book_id'];
    }

    mysqli_close($connection);

    // Return JSON with books
    echo json_encode($books);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Connect to database
    $connection = mysqli_connect('localhost', 'root', '', 'bookshop');

    // Get book ID
    $book = $_POST['book'];

    // Check connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (!isset($_SESSION['user_id'])) {
        die();
    }

    // If no book_id supplied, delete all
    if (!isset($book)) {
        $sql = "DELETE FROM basket WHERE user_id = " . $_SESSION['user_id'];
    }
    else {
        $sql = "DELETE FROM basket WHERE user_id = " . $_SESSION['user_id'] . " AND book_id = $book";
    }

    mysqli_query($connection, $sql);

    mysqli_close($connection);

    // Return JSON with success
    echo json_encode(['success' => true]);
}