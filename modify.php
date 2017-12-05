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
$link = new mysqli("tvc353_2.encs.concordia.ca", "tvc353_2", "iLcS2017", "tvc353_2");
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
 
<div class="content">
    <form name="find" action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <fieldset>
            <legend>Modify an Ad</legend>
            
            <label>Title</label>
            <input type="text" name="title" value="<?php echo $title; ?>">
            <br>

            <input type="hidden" name="id" value="<?php echo $id; ?>" />

            <label>Description</label>
            <input class= "wideInput" type="textarea" name="description" value="<?php echo $description; ?>" >
            <br>

            <label>Price:</label>
            <input type="number" name="price" value="<?php echo $price; ?>"/>
            <br/>

            <label>Ad Type:</label>
            <input type="text" name="adtype" value="<?php echo $adtype; ?>"/>
            <br/>

            <label for="edit_input_forsaleby">For Sale By:</label>
            <select id="edit_input_forsaleby" class="edit_input" name="forSaleby" value="<?php echo $forSaleby; ?>">
            <option value="Owner">Owner </option>
            <option value="Business">Business</option>
            </select>
            <br>

            <label for="edit_input_availability">Availability</label>
            <select id="edit_input_availability" class="edit_input" name="availability" value="<?php echo $availability; ?>">
            <option value="Online">Online </option>
            <option value="Store">Store</option>
            </select>
            <br>

            <label>Images</label>
            <input type="Images" name="images" value="<?php echo $images; ?>">
            <br>

        </fieldset>

        <br>

        <button type = "submit" name = "submit_btn" value = "Submit">Submit</button>
        <button type = "reset" value = "Reset">Clear</button>
    </form>
    <br />
</div>

<?php

// Attempt select query execution
if (isset($_POST['submit_btn'])) {
    
    // Check if the ID is an integer
    if (is_numeric($_POST['id'])) 

    {
        
        // get the form data, making sure everything is valid
        $id = $_POST['id'];
        $price = mysqli_real_escape_string(htmlspecialchars($_POST['price']));
        $adtype = mysqli_real_escape_string(htmlspecialchars($_POST['adtype']));
        $forSaleby = mysqli_real_escape_string(htmlspecialchars($_POST['forSaleby']));
        $availability = mysqli_real_escape_string(htmlspecialchars($_POST['availability']));
        $title = mysqli_real_escape_string(htmlspecialchars($_POST['title']));
        $description = mysqli_real_escape_string(htmlspecialchars($_POST['description']));
        $images = mysqli_real_escape_string(htmlspecialchars($_POST['images']));

        // check if all the fields are filled in
        if ($price == '' || $adtype == '' || $forSaleby == '' || $availability == '' || $title == '' || $description == '' || $images == '') {

            // display error mesage
            $error = 'Please fill in all the fields before submitting';

        }

        else

        {
            // save the new data to the database
            $sql = mysql_query("UPDATE myAd SET price = '$price', adtype = '$adtype', forSaleby = '$forSaleby', availability = '$availability', title = '$title', description = '$description', images = '$images' ")

            or die(mysql_error());

            echo "Form Updated!";
        }

    else
    {

        // if the 'id' isn't valid, display error
        echo 'Error!';

    }
    }

}

?>


</body>
</html>


<style type="text/css">
.wideInput{
    text-align: left;
    padding-left:0;
    padding-top:0;
    padding-bottom:0.4em;
    padding-right: 0.4em;;
    width: 400px;
    height: 200px;
}
</style>