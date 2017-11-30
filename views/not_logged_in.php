<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo "<div class='container' style='padding-top: 40px;padding-bottom: 40px;background-color: #eee;
			max-width: 330px;padding: 15px;margin: 0 auto;'>" . $message . "</div>";
        }
    }
}
?>

<!DOCTYPE HTML>
<html lang = "US-en">
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
		<style type="text/css">
			body {
				padding-top: 40px;
				padding-bottom: 40px;
				background-color: #eee;
			}

			.form-signin {
				max-width: 330px;
				padding: 15px;
				margin: 0 auto;
			}

			.form-signin .form-signin-heading,
			.form-signin .checkbox {
				margin-bottom: 10px;
			}

			.form-signin .checkbox {
				font-weight: 400;
			}

			.form-signin .form-control {
				position: relative;
				box-sizing: border-box;
				height: auto;
				padding: 10px;
				font-size: 16px;
			}

			.form-signin .form-control:focus {
				z-index: 2;
			}

			.form-signin input[type="email"] {
				margin-bottom: -1px;
				border-bottom-right-radius: 0;
				border-bottom-left-radius: 0;
			}

			.form-signin input[type="password"] {
				margin-bottom: 10px;
				border-top-left-radius: 0;
				border-top-right-radius: 0;
			}
		</style>
	</head>
    <body>
		<div class="container">

			<form class="form-signin" method="post" action="index.php" name="loginform">
				<h2 class="form-signin-heading">Please sign in</h2>
				
				<label for="login_input_email" class="sr-only">Email address</label>
				<input name="user_email" type="email" id="login_input_email" class="form-control" placeholder="Email address" required autofocus>
				
				<label for="login_input_password" class="sr-only">Password</label>
				<input name="user_password" type="password" id="login_input_password" class="form-control" placeholder="Password" required>

				<div class="alert alert-primary" role="alert">
					<a href="register.php" class="alert-link">Register new account</a>
				</div>
				
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
			</form>

		</div> <!-- /container -->
    </body>
