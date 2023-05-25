<?php
include_once("dbconnection.php");
session_start();

if (!isset($_SESSION["priv"])) {
    header("Location: index.php?error=2");
    exit;
}

$user_id = $_SESSION["id"];
$id = $_POST["book_id"];

$statement = $mysqli->prepare("UPDATE books SET user_id = 0 WHERE id = ?");
$statement->bind_param('i', $id);

if ($statement->execute()) {
    header("Location: ../panel.php");
    exit;
} else {
    die('Error: (' . $mysqli->errno . ') ' . $mysqli->error);
}
?>
