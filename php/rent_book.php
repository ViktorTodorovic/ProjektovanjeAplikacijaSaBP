<?php
include_once("dbconnection.php");
session_start();

if (!isset($_SESSION["priv"])) {
    header("Location: index.php?error=2");
    exit;
}

$user_id = $_SESSION["id"];
$id = $_POST["book_id"];

$statement = $mysqli->prepare("UPDATE books SET user_id = ? WHERE id = ?");
$statement->bind_param('ii', $user_id, $id);

if ($statement->execute()) {
    header("Location: ../panel.php");
    exit;
} else {
    die('Error: (' . $mysqli->errno . ') ' . $mysqli->error);
}
?>
