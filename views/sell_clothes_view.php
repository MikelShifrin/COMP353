<!DOCTYPE HTML>
<html>
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sell - Clothes</title>

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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sell.php">Stuff</a>
                    </li>
				    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sell
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

		<div class="container ">
			<div class="jumbotron">
				<h1>Add Clothes</h1> 
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return" method="post" name="myForm">
					<div class="form-group">
						<label for="exampleInputEmail1">Price</label>
						<input type="number" class="form-control" id=""  placeholder="Enter Price" name='price' required>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Rating</label>
						<select class="form-control" id="exampleFormControlSelect1" name="rating">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>	
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Description</label>
						<textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="60" required></textarea>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Title</label>
						<input type="input" class="form-control" id=""  placeholder="Enter Title" name='title' required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Type</label>
						<input type="input" class="form-control" id=""  placeholder="Enter Type" name='type' required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Start Date</label>
						<input name="startDate" id="startDate" class="form-control" type="date"  readonly>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">End Date</label>
						<input name="endDate" id="endDate" class="form-control" type="date" required>
					</div>  
					<div class="form-group">
						<label for="exampleInputEmail1">Street Name</label>
						<input type="input" class="form-control" id=""  placeholder="Enter Street Name" name='streetName' required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Postal Code</label>
						<input type="input" class="form-control" id=""  placeholder="Enter Postal Code" name='postalCode'  maxlength="6" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Street Number</label>
						<input type="number" class="form-control" id=""  placeholder="Enter Street Number" name='streetNumber' required>
					</div>
					<div class='form-group' id = 'container'>
					</div>  
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
		<script>
			var d = new Date();
			var date = d.getDate();
			var month = d.getMonth()+1;

			if(date < 10)
			{
				var date = "0" + date;
			}
			
			if(month < 10)
			{
				var month = "0" + month;
			}
			
			document.getElementById("startDate").value = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + date ;
		</script>
		
		<?php

			function provinceDropdown(){
				$db_connection = new mysqli("tvc353_2.encs.concordia.ca", "tvc353_2", "iLcS2017","tvc353_2");
				$queryFindProvince = "SELECT DISTINCT cityName FROM City";
				$passQuery = mysqli_query($db_connection , $queryFindProvince);
				mysqli_close($db_connection);
				$classes_sections = array();
				$inc = 0;
				$together = "";
				while( $rowAllProvinces = mysqli_fetch_assoc( $passQuery)){
					++$inc;
					$classes_sections[] =
					"var classText". $inc . " = document.createTextNode(\"" .  $rowAllProvinces['cityName'] . "\");
					var optionClass". $inc ." = document.createElement(\"option\");
					optionClass". $inc .".appendChild(classText". $inc .");
					selectClass.appendChild(optionClass". $inc .");";
				}
				//looping through all classes + sections and storing it as one long string into $together
				for ($key = 0, $size = count($classes_sections); $key < $size; $key++) {
					$together .= $classes_sections[$key] . " ";
				}
				echo
				'<script>
					document.onload = dropdown();
					function dropdown(){
						//var number = document.getElementById("sel1").value;
						// Container <div> where dynamic content will be placed
						var container = document.getElementById("container");
						//var stuff = document.createElement("input");
						//container.appendChild(stuff);
						while (container.hasChildNodes()) {
							container.removeChild(container.lastChild);
						}
						for (i=0;i<1;i++){//number;i++){
							// Create an <input> element, set its type and name attributes
							var div = document.createElement("div");
							div.className = "form-group";
							var label = document.createElement("label");
							var p = document.createElement("p");
							var text = document.createTextNode("Enter your city:");
							p.appendChild(text);
							label.appendChild(p);
							div.appendChild(label);
							//creating Class dropdown selection
							var number1 = i + 1;
							var selectClass = document.createElement("select");
							selectClass.className = "form-control";
							selectClass.placeholder = "Class";
							selectClass.name = "city";
							' . $together . '
							div.appendChild(selectClass);
							container.appendChild(div);
						}
					}
				</script>';
			}
			provinceDropdown();
		?>
	

		<?php 

			if(isset($_POST['price']))
			{
				
				/*
				echo "<table>";
				foreach ($_POST as $key => $value) 
				{
					echo "<tr>";
					echo "<td>";
					echo $key;
					echo "</td>";
					echo "<td>";
					echo $value;
					echo "</td>";
					echo "</tr>";
				}
				echo "</table>";
				*/
				submit();
			}
	
			function submit()
			{

				$cID = uniqid();
				$addressID = uniqid();
				$adID = uniqid();

				$db_connection = new mysqli("tvc353_2.encs.concordia.ca", "tvc353_2", "iLcS2017","tvc353_2");
				
				$queryAddClothes="insert into Clothes (cID,price,rating,descr,title,type,date,cType) values ('".$cID."', '".$_POST['price']."','". $_POST['rating'] ."','".$_POST['description']."','".$_POST['title']."','".$_POST['type']."','".$_POST['startDate']."','Buy and Sell')";
				$queryAddAddress="insert into Address (addressID,street,pCode,streetNo,cityName) values ('".$addressID."', '".$_POST['streetName']."','".$_POST['postalCode']."','".$_POST['streetNumber']."','".$_POST['city']."')";
				$queryGetUID="select uID from User where email='".$_SESSION['user_email']."'";
				

				$ret = mysqli_query($db_connection, $queryAddClothes);
				$ret1 =mysqli_query($db_connection, $queryAddAddress); 
				$ret2 =mysqli_query($db_connection, $queryGetUID);  
		
				$rowAllUID = mysqli_fetch_assoc($ret2);

		
				//$queryAddAd="insert into Ad(adID,isPromo,startDate,endDate,userID,addressID,cID) values ('".$adID."','false','".$_POST['startDate']."','".$_POST['endDate']."','".$rowAllUID['uID']."','".$addressID."','".$cID."')";
				$queryAddAd="insert into Ad(adID,startDate,endDate,userId,addressID,cID) values ('".$adID."','".$_POST['startDate']."','".$_POST['endDate']."','".$rowAllUID['uID']."','".$addressID."','".$cID."')";

				$ret3 =mysqli_query($db_connection, $queryAddAd);		

				if(!$ret) 
				{
					mysqli_close($db_connection);
					echo "connection failed";
					return false;
				}
				
				if(!$ret1) 
				{
					mysqli_close($db_connection);
					echo "connection failed to address";
					return false;
				}
			}

		?>

    </body>
</html>