
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sports Owl | Sign Up</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

		 <!-- Link to CSS sheet -->
	<link href="login.css" rel="stylesheet">
</head>
<body>


		<div class="container">
				<div class="row login">
					<div class="header">
   						 <img src="other_files/transparent.png">
   						 <p><strong>Sign Up</strong></p>
  					</div> 
				</div> <!-- .row -->
		</div> <!-- .container -->

			<div class="container">
				<!-- Postback - submit form to itself -->
				<form action="signUpConfirm.php" method="POST">

					<div class="row mb-3">
						<div class="font-italic text-danger col-sm-12 ml-sm-auto">
							<?php 
								if(isset($error) && !empty($error)) {
									echo $error;
								}
							?>
						</div>
					</div> <!-- .row -->
					
					<!-- FIRST NAME -->
					<div class="form-group row login">
						<label for="fName-id" class="col-sm-3 col-form-label text-sm-right">First Name: <span class="text-danger">*</span></label></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="fName-id" name="fName">
							<small id="fName-error" class="invalid-feedback">First name is required.</small>
						</div>
					</div> <!-- .form-group -->
					<!-- LAST NAME -->
					<div class="form-group row login">
						<label for="lName-id" class="col-sm-3 col-form-label text-sm-right">Last Name: <span class="text-danger">*</span></label></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="lName-id" name="lName">
							<small id="lName-error" class="invalid-feedback">Last name is required.</small>
						</div>
					</div> <!-- .form-group -->

					<!-- USERNAME -->
					<div class="form-group row login">
						<label for="username-id" class="col-sm-3 col-form-label text-sm-right">Username: <span class="text-danger">*</span></label></label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="username-id" name="username">
							<small id="username-error" class="invalid-feedback">Username is required.</small>
						</div>
					</div> <!-- .form-group -->

					<!-- PASSWORD -->
					<div class="form-group row login">
						<label for="password-id" class="col-sm-3 col-form-label text-sm-right">Password: <span class="text-danger">*</span></label></label>
						<div class="col-sm-9">
							<input type="password" class="form-control" id="password-id" name="password">
							<small id="password-error" class="invalid-feedback">Password is required.</small>
						</div>
					</div> <!-- .form-group -->

					<div class="row">
						<div class="ml-auto col-sm-12">
							<span class="text-danger font-italic">* Required</span>
						</div>
					</div> <!-- .form-group -->


					<div class="form-group row login">
						<div class="col-sm-3"></div>
						<div class="col-sm-12 mt-2">
							<button type="submit" class="btn btn-primary">Create Account</button>
							<a href="login.php" role="button" class="btn btn-light">Back</a>
						</div>
					</div> <!-- .form-group -->
				</form>

				<div class="col-sm-12 newUser"> <a href="login.php"> <strong> Already have an account? Go back to login page here! </strong></a></div>
		</div> <!-- .container -->


		<script>

document.querySelector('form').onsubmit = function(){

			if ( document.querySelector('#fName-id').value.trim().length == 0 ) {
				document.querySelector('#fName-id').classList.add('is-invalid');
			} 
			else {
				document.querySelector('#fName-id').classList.remove('is-invalid');
			}
			
			if ( document.querySelector('#lName-id').value.trim().length == 0 ) {
				document.querySelector('#lName-id').classList.add('is-invalid');
			} 
			else {
				document.querySelector('#lName-id').classList.remove('is-invalid');
			}
			
			if ( document.querySelector('#username-id').value.trim().length == 0 ) {
				document.querySelector('#username-id').classList.add('is-invalid');
			} 
			else {
				document.querySelector('#username-id').classList.remove('is-invalid');
			}
			
			if ( document.querySelector('#password-id').value.trim().length == 0 ) {
				document.querySelector('#password-id').classList.add('is-invalid');
			} 
			else {
				document.querySelector('#password-id').classList.remove('is-invalid');
			}
			// return false prevents the form from being submitted
			// If length is greater than zero, then it means validation has failed. Invert the response and can use that to prevent form from being submitted.
			return ( !document.querySelectorAll('.is-invalid').length > 0 );
		
}
		</script>	

</body>
</html>

