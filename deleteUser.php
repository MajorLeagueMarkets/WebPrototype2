<?php
require "config.php";

//if user is already loggedin, kick them and dont let them login again
if( isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true ) {

	header("Location: home.php");

}

else {
//check user has submitted form as opposed to just getting to page
if ( isset($_POST["username"]) && isset($_POST["password"]) ) {
	//user attempted to login - check for two more cases

	//1. validate - make sure user entered user name and pass
		if( empty($_POST["username"]) || empty($_POST["password"]) ) {
			$error = "Please enter a username and password to delete account";
		}

		else {

			// Authenticate this user by connection to the DB
			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if($mysqli->connect_errno) {
				echo $mysqli->connect_error;
				exit();
			}


			$usernameInput = $_POST["username"];
			// hash the password that user typed in
			$passwordInput = hash("md5", $_POST["password"]);


			$sql = "SELECT * FROM users WHERE username = '" . $usernameInput . "' AND password = '" . $passwordInput . "';";
			//echo "<hr>";
			//echo $sql;
			$results = $mysqli->query($sql);
			if(!$results) {
				echo $mysqli->error;
				exit();
			}
			if($results->num_rows > 0) {

				$user_row = $results->fetch_assoc();
				// Log them in
				//$_SESSION['logged_in'] = true;
				$_SESSION['username'] = $usernameInput;
			    $_SESSION['user_id'] = $user_row['id'];

			    if (isset($_SESSION['user_id']) ) {
			    	header('Location: deleteConfirm.php');
			    }
				// Redirect user to the delete confirm
				//header('Location: deleteConfirm.php');
			}
			else {
				$error = "Invalid username or password";
			}
		}


	}	//end if for isset
} //end else
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sports Owl | Delete User</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

		 <!-- Link to CSS sheet -->
	<link href="login.css" rel="stylesheet">
</head>
<body>


		<div class="container">
				<div class="row login">
					<div class="header">
   						 <img src="other_files/transparent.png">
   						 <p><strong>Delete User</strong></p>
  					</div> 
				</div> <!-- .row -->
			</div> <!-- .container -->

			<div class="container">
				<!-- Postback - submit form to itself -->
				<form action="deleteConfirm.php" method="POST">

					<div class="row mb-3">
						<div class="font-italic text-danger col-sm-12 ml-sm-auto">
							<?php 
								if(isset($error) && !empty($error)) {
									echo $error;
								}
							?>
						</div>
					</div> <!-- .row -->
					

					<div class="form-group row login">
						<label for="username-id" class="col-sm-3 col-form-label text-sm-right">Username:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="username-id" name="username">
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row login">
						<label for="password-id" class="col-sm-3 col-form-label text-sm-right">Password:</label>
						<div class="col-sm-9">
							<input type="password" class="form-control" id="password-id" name="password">
						</div>
					</div> <!-- .form-group -->

					<div class="form-group row login">
						<div class="col-sm-3"></div>
						<div class="col-sm-12 mt-2">
							<button type="submit" class="btn btn-primary">Delete USER</button>
							<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light">Cancel</a>
						</div>
					</div> <!-- .form-group -->
				</form>


				<div class="col-sm-12 newUser"> <a href="login.php"> <strong>Go back to login! </strong></a></div>
			</div> <!-- .container -->




</body>
</html>