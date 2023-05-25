<?php
// php/remove_book.php

include_once("dbconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST["book_id"];
    var_dump($book_id);

    // Perform the database query to remove the book
    $query = "DELETE FROM books WHERE id = '$book_id'";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        // Book removed successfully
        header("Location: ../panel.php");
        exit();
    } else {
        die("Error removing the book from the database: " . mysqli_error($mysqli));
    }
} else {
    die("Invalid request");
}
?>
