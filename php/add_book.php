<?php

include_once("dbconnection.php");


    $id = $_REQUEST["id"];
    $isbn = $_REQUEST["isbn"];
    $autor = $_REQUEST["autor"];
    $name = $_REQUEST["name"];
    $genre = $_REQUEST["genre"];
    $year = $_REQUEST["year"];


    $statement = $mysqli->prepare("INSERT INTO books (isbn, autor, name, genre, year) VALUES (?, ?, ?, ?, ?)");

    $statement->bind_param('sssss', $isbn, $autor, $name, $genre, $year);

    if($statement->execute()){
        header("Location: ../add_book.php?success=1");
    }else{
        die('Error: (' .$mysqli->errno . ')' . $mysqli->error);
    }



?>