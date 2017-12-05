<!DOCTYPE HTML>
<html lang = "US-en">
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Homepage</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand" href="index.php">NavBar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            View Ads
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="admin_clothes.php">Clothes</a>
                            <a class="dropdown-item" href="admin_books.php">Books</a>
                            <a class="dropdown-item" href="admin_musical_instruments.php">Musical Instruments</a>
                            <a class="dropdown-item" href="admin_electronics.php">Electronics</a>
                        </div>
                    </li>
					<li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Reports
							<span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="report1.php">Report 1</a>
							<a class="dropdown-item" href="report2.php">Report 2</a>
							<a class="dropdown-item" href="report3.php">Report 3</a>
							<a class="dropdown-item" href="report4.php">Report 4</a>
							<a class="dropdown-item" href="report5.php">Report 5</a>
							<a class="dropdown-item" href="report6.php">Report 6</a>
							<a class="dropdown-item" href="report7.php">Report 7</a>
							<a class="dropdown-item" href="report8.php">Report 8</a>
							<a class="dropdown-item" href="report9.php">Report 9</a>
							<a class="dropdown-item" href="report10.php">Report 10</a>
                            <a class="dropdown-item" href="report11.php">Report 11</a>
                            <a class="dropdown-item" href="report12.php">Report 12</a>
                            <a class="dropdown-item" href="report13.php">Report 13</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="index.php?logout">
                    <a href="index.php?logout" class="btn btn-outline-dark">Logout</a>
                </form>
            </div>
        </nav>
        <div class="jumbotron">
          <h1 class="display-3">Report 8</h1>

          <hr class="my-4">
          <p class="lead"></p>
        </div>

        <div class=container>
            <div class="page-header">
                <h1>Report 8</h1>
            </div>
            <code>
                SELECT Booking.listItems<br>
                FROM StrategicLocation1, Booking, forSL1<br>
                WHERE StrategicLocation1.owner = forSL1.owner AND StrategicLocation1.desc =  'PROVINCE'  AND forSL1.bookID = Booking.bookID<br>
                <br>
                SELECT Booking.listItems<br>
                FROM StrategicLocation2, Booking, forSL2<br>
                WHERE StrategicLocation2.owner = forSL2.owner AND StrategicLocation2.desc =  'PROVINCE'  AND forSL2.bookID = Booking.bookID<br>
                <br>
                SELECT Booking.listItems<br>
                FROM StrategicLocation3, Booking, forSL3<br>
                WHERE StrategicLocation3.owner = forSL3.owner AND StrategicLocation3.desc =  'PROVINCE'  AND forSL3.bookID = Booking.bookID<br>
                <br>
                SELECT Booking.listItems<br>
                FROM StrategicLocation4, Booking, forSL4<br>
                WHERE StrategicLocation4.owner = forSL4.owner AND StrategicLocation4.desc =  'PROVINCE'  AND forSL4.bookID = Booking.bookID<br>
                <br>
            </code>

            </div>
    </body>
