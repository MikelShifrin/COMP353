<!DOCTYPE HTML>
<html lang = "US-en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homepage</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

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
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="sell.php">Sell</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Buy <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="buy_user.php">Buy (User)</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="index.php?logout">
            <a href="index.php?logout" class="btn btn-outline-dark">Logout</a>
        </form>
    </div>
</nav>
<?php
// Attempt MySQL server connection
$link = new mysqli("127.0.0.1", "tvc353_2", "iLcS2017", "tvc353_2");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

<div class="content">
    <form name="find" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <fieldset>
            <legend>Buy an Ad</legend>
            <label>Category:</label>
            <select name = "category" required>
                <option value=""></option>
                <option value="Clothes">Clothes</option>
                <option value="Books">Books</option>
                <option value="Electronics">Electronics</option>
                <option value="Musical Instruments">Musical Instruments</option>
            </select>
            <br><br>
            <label>City:</label>
            <select name="city" required>
                <option value=""></option>
                <?php
                $sql = mysqli_query($link, "SELECT cityName FROM Address");
                while ($row = $sql->fetch_assoc()){
                    echo "<option value=" . $row['cityName'] . ">" . $row['cityName'] . "</option>";
                }
                ?>
            </select>
            <br>
        </fieldset>
        <br>
        <button type = "submit" name = "submit_btn" value = "Submit">Find</button>
        <button type = "reset" value = "Reset">Clear</button>
    </form>
    <br />

<?php
// Attempt select query execution
if (isset($_POST['submit_btn'])) {
    //Initializing variable
    $city = $_POST['city'];

    //NO CATEGORY
    if ($_POST['category'] == '') {
        echo "No records matching your query were found.";
    }
    //CATEGORY: Books
    else if ($_POST['category'] == 'Books') {
        $sql = "SELECT Ad.*, Books.*
        FROM Ad, Address, Books
        WHERE Ad.addressID = Address.addressID AND Books.bID = Ad.bID AND Address.cityName = '" . $city . "' AND Ad.bID IS NOT NULL";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table class=\"sortable\" style=\"width:100 %; text-align:center\">";
                echo "<tr>";
                echo "<th>Title</th>";
                echo "<th>Description</th>";
                echo "<th>Type</th>";
                echo "<th>Rating</th>";
                echo "<th>Date</th>";
                echo "<th>Price</th>";
                echo "<th>Buy</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['descr'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . $row['rating'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>$" . $row['price'] . "</td>";
                    echo "<td><button type=\"button\" onClick=\"\">Interested</button></td>";
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
    }
    //CATEGORY: Clothes
    else if ($_POST['category'] == 'Clothes') {
        $sql = "SELECT Ad.*, Clothes.*
        FROM Ad, Address, Clothes
        WHERE Ad.addressID = Address.addressID AND Clothes.cID = Ad.cID AND Address.cityName = '" . $city . "' AND Ad.cID IS NOT NULL";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table class=\"sortable\" style=\"width:100 %; text-align:center\">";
                echo "<tr>";
                echo "<th>Title</th>";
                echo "<th>Description</th>";
                echo "<th>Type</th>";
                echo "<th>Rating</th>";
                echo "<th>Date</th>";
                echo "<th>Price</th>";
                echo "<th>Buy</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['descr'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . $row['rating'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>$" . $row['price'] . "</td>";
                    echo "<td><button type=\"button\" onClick=\"\">Interested</button></td>";
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
    }
    //CATEGORY: ELECTRONICS
    else if ($_POST['category'] == 'Electronics') {
        $sql = "SELECT Ad.*, Electronics.*
        FROM Ad, Address, Electronics
        WHERE Ad.addressID = Address.addressID AND Electronics.eID = Ad.eID AND Address.cityName = '" . $city . "' AND Ad.eID IS NOT NULL";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table class=\"sortable\" style=\"width:100 %; text-align:center\">";
                echo "<tr>";
                echo "<th>Title</th>";
                echo "<th>Description</th>";
                echo "<th>Type</th>";
                echo "<th>Rating</th>";
                echo "<th>Date</th>";
                echo "<th>Price</th>";
                echo "<th>Buy</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['descr'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . $row['rating'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>$" . $row['price'] . "</td>";
                    echo "<td><button type=\"button\" onClick=\"\">Interested</button></td>";
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
    }
    //CATEGORY: MUSICAL INSTRUMENTS
    else if ($_POST['category'] == 'Musical Instruments') {
        $sql = "SELECT Ad.*, MusicalInstruments.*
        FROM Ad, Address, MusicalInstruments
        WHERE Ad.addressID = Address.addressID AND MusicalInstruments.miID = Ad.miID AND Address.cityName = '" . $city . "' AND Ad.miID IS NOT NULL";
        if ($result = mysqli_query($link, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table class=\"sortable\" style=\"width:100 %; text-align:center\">";
                echo "<tr>";
                echo "<th>Title</th>";
                echo "<th>Description</th>";
                echo "<th>Type</th>";
                echo "<th>Rating</th>";
                echo "<th>Date</th>";
                echo "<th>Price</th>";
                echo "<th>Buy</th>";
                echo "</tr>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['descr'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . $row['rating'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>$" . $row['price'] . "</td>";
                    echo "<td><button type=\"button\" onClick=\"\">Interested</button></td>";
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
    }
}
// Close connection
mysqli_close($link);
?>

</body>
</html>