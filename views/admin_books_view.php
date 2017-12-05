<!DOCTYPE HTML>
<html>
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Books</title>

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

                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            View Ads
                            <span class="sr-only">(current)</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="admin_clothes.php">Clothes</a>
                            <a class="dropdown-item" href="admin_books.php">Books</a>
                            <a class="dropdown-item" href="admin_musical_instruments.php">Musical Instruments</a>
                            <a class="dropdown-item" href="admin_electronics.php">Electronics</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="index.php?logout">
                    <a href="index.php?logout" class="btn btn-outline-dark">Logout</a>
                </form>
            </div>
        </nav>
		<br><br>
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-3">Books View</h1>
				<p class="lead"></p>
			</div>
		</div>
		
<br><br>

		<div class=container>
            <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="delete_form">
			<table class="table table-hover table-bordered table-responsive table-striped" id="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">User</th>
						<th scope="col">Price</th>
						<th scope="col">Rating</th>
						<th scope="col">Description</th>
						<th scope="col">Title</th>
						<th scope="col">Type</th>
						<th scope="col">Start Date</th>
						<th scope="col">End Date</th>
						<th scope="col">cType</th>
                        <th scope="col">Delete</th>
					</tr>
				</thead>
				<tbody>
					<tr hidden>
						<th scope="row"></th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
            </form>
		</div class=container>
		<?php
			function fillTable(){
				$db_connection = new mysqli("tvc353_2.encs.concordia.ca", "tvc353_2", "iLcS2017","tvc353_2");
				$queryGetBooks = "SELECT Books.price,Books.rating,Books.descr,Books.title,Books.type,Books.date,Books.cType,Books.bID,Ad.bID as Ad,Ad.userID,Ad.startDate,Ad.endDate,User.email FROM (Books INNER JOIN Ad ON Books.bID=Ad.bID) INNER JOIN User ON Ad.userID=User.uID";
				//$queryGetBooks = "SELECT * FROM Books";
				$passQuery = mysqli_query($db_connection , $queryGetBooks);
				mysqli_close($db_connection);
				$classes_sections = array();
				$inc = 0;

				echo "
				<script>
					";
					while( $rowAllProvinces = mysqli_fetch_array( $passQuery))
					{
						++$inc;

				echo	"
                        var form = document.getElementById('delete_form');
						var table = document.getElementById('table');
						var row = table.insertRow();
						var cell1 = row.insertCell();
						var cell11 = row.insertCell();
						var cell2 = row.insertCell();
						var cell3 = row.insertCell();
						var cell4 = row.insertCell();
						var cell5 = row.insertCell();
						var cell6 = row.insertCell();
						var cell7 = row.insertCell();
						var cell8 = row.insertCell();
						var cell9 = row.insertCell();
                        var cell10= row.insertCell();
						var b = document.createElement(\"BUTTON\");
                        var d = document.createTextNode(\"Delete\");
                        b.id = '".$rowAllProvinces['bID']."';
                        b.setAttribute('value', '".$rowAllProvinces['bID']."');
                        b.setAttribute('name', 'btn');
                        b.setAttribute('type', 'submit');
                        b.appendChild(d);

						cell1.outerHTML = '<th>' + ".$inc." + '</th>';
						cell11.innerHTML = '".$rowAllProvinces['email']."';
						cell2.innerHTML = '".$rowAllProvinces['price']."';
						cell3.innerHTML = '".$rowAllProvinces['rating']."';
						cell4.innerHTML = '".$rowAllProvinces['descr']."';
						cell5.innerHTML = '".$rowAllProvinces['title']."';
						cell6.innerHTML = '".$rowAllProvinces['type']."';
						cell7.innerHTML = '".$rowAllProvinces['startDate']."';
						cell8.innerHTML = '".$rowAllProvinces['endDate']."';
						cell9.innerHTML = '".$rowAllProvinces['cType']."';
                        cell10.appendChild(b);";
					};
				echo "</script>	   ";
			}
			fillTable();
		?>


        <?php
        function deleteAd()
        {
            $db_connection = new mysqli("tvc353_2.encs.concordia.ca", "tvc353_2", "iLcS2017", "tvc353_2");
            if (isset($_POST['btn'])) {
                $bID = $_POST['btn'];

                $queryGetBooks = "SELECT Ad.addressID FROM Books INNER JOIN Ad ON Books.bID=Ad.bID";
                $ret2 = mysqli_query($db_connection, $queryGetBooks);
                $rowAllProvinces = mysqli_fetch_array( $ret2);

                $queryDeleteBooks = "delete from Books where bID = '" . $bID . "'";
                $queryDeleteAd = "delete from Ad where bID = '" . $bID . "'";
                $queryDeleteAddress = "DELETE FROM Address WHERE addressID='".$rowAllProvinces['addressID']."'";

                $ret = mysqli_query($db_connection, $queryDeleteBooks);
                $ret1 = mysqli_query($db_connection, $queryDeleteAd);
                $ret3 = mysqli_query($db_connection, $queryDeleteAddress);

                echo "<script>window.location.href=window.location.href;</script>";
            }
        }
        deleteAd();
        ?>
    </body>
</html>
