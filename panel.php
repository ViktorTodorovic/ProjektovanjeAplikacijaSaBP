<?php
include_once("php/dbconnection.php");
session_start();
if(!isset($_SESSION["priv"])){
    die(header("Location: index.php?error=2"));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css">

    <title>User panel</title>
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col-12">
                <header class="mb-4">
                    <nav class="navbar translucent-card fixed-top">
                        <a class="navbar-brand" href="panel.php">Biblioteka</a>
                        <a href="./php/logout.php" class="navbar-item">Logout</a>
                        </button>
                    </nav>
                </header>

<div class="container">
<div class="card translucent-card text-white">
<div class="card-header translucent-card">List of Books</div>
                    <div class="card-body translucent-card">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                    <th>ISBN</th>
                        <th>Autor</th>
                            <th>Name</th>
                                <th>Genre</th>
                                <th>Year</th>
                                <th>Action</th>
</thead>
<tbody>
    <?php
    $query="SELECT * FROM books";
    $result = mysqli_query($mysqli,$query);

    if(!$result){
        die('Greska pri konekciji sa bazom!');

    }
    ?>
    <?php while($books =mysqli_fetch_assoc($result))

    {?>
    <tr>
        <td><?php echo $books['id'] ?></td>
        <td><?php echo $books['isbn'] ?></td>
        <td><?php echo $books['autor'] ?></td>
        <td><?php echo $books['name'] ?></td>
        <td><?php echo $books['genre'] ?></td>
        <td><?php echo $books['year'] ?></td>
        <td>
    <form method="post" action="php/remove_book.php">
        <input type="hidden" name="book_id" value="<?php echo $books['id'] ?>">
        <button type="submit" class="btn btn-danger">Remove</button>
    </form>
</td>

    </tr>
    <?php } ?>   
</tbody>
    </table>
    <div class="card-footer translucent-card">
    <button id="add-book-btn" onclick="showAddBookForm()" class="btn btn-primary">Add Book</button>

    </div>
    </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>