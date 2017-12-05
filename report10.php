<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report 10</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="#">NavBar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="buy.php">Buy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="buy_user.php">Buy (User)</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sell
                    <span class="sr-only">(current)</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="sell_clothes.php">Clothes</a>
                    <a class="dropdown-item" href="sell_books.php">Books</a>
                    <a class="dropdown-item" href="sell_musical_instruments.php">Musical Instruments</a>
                    <a class="dropdown-item" href="sell_electronics.php">Electronics</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="index.php?logout">
            <a href="index.php?logout" class="btn btn-outline-dark">Logout</a>
        </form>
    </div>
</nav>
<br><br>
<?php
// Attempt MySQL server connection
$link = new mysqli("tvc353_2.encs.concordia.ca", "tvc353_2", "iLcS2017", "tvc353_2");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

<div class=container>
    <div class="page-header">
        <h1>Report 10</h1>
    </div>
        <?php
        // Attempt select query execution
        $sql = "SELECT Books.*
                FROM Books, Ad
                WHERE Books.bID = Ad.bID
                ORDER BY COUNT(Books.price) ASC
                LIMIT 1;";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table class=\"table table-hover table-bordered table-responsive table-striped\" id=\"table\">";
                echo "<tr>";
                echo "<th>Title</th>";
                echo "<th>Description</th>";
                echo "<th>Type</th>";
                echo "<th>Rating</th>";
                echo "<th>Date</th>";
                echo "<th>Price</th>";
                echo "<th>Subcategory</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['descr'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . $row['rating'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>$" . $row['price'] . "</td>";
                    echo "<td>Books</td>";
                    echo "</tr>";
                }
                echo "</table>";
                // Close result set
                mysqli_free_result($result);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        // Close connection
        mysqli_close($link);
        ?>

    </div>

</body>
</html>
