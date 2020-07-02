<?php
require "config.php";


//if user is already logged in, kick them and dont let them login again
if( isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true ) {

    header("Location: home.php");

}



//check user has submitted form as opposed to just getting to page
if ( isset($_POST["fName"]) && isset($_POST["lName"]) && isset($_POST["username"]) && isset($_POST["password"]) ) {
    //user attempted to login - check for two more cases

    //1. validate - make sure user entered user name and pass
        if( empty($_POST["fName"]) || empty($_POST["lName"]) || empty($_POST["username"]) || empty($_POST["password"]) ) {
            $error = "Please fill out all field inputs!";
        }


        else {

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ( $mysqli->errno ) {
            echo $mysqli->error;
            exit();
        }

        // Sanitize user input
        $fName = $mysqli->real_escape_string($_POST['fName']);
        $lName = $mysqli->real_escape_string($_POST['lName']);
        $username = $mysqli->real_escape_string($_POST['username']);
        $password = hash("md5", $_POST['password']);
        $cashBalance = 1000.00;





        //CHECK IF USERNAME EXISTS
        $sql_usernames = "SELECT * FROM users WHERE username = '" . $_POST["username"] . "'";

        //submit the query via PHP MySQLi and save the results in $results
        // Arrow notation -> to access an objects methods or properties vs brackets[] to access associative array
        $results_usernames = $mysqli->query($sql_usernames);

        // check that no errors occurred when quesry is submitted. $results will return null if an error occured
        if ( !$results_usernames ) {
            echo $mysqli->error;
            //exit the program if there is an error. No reason to continue on
            exit();
        }


        if( $results_usernames->num_rows > 0) {

            //username taken
            $error = "Username or email has been already taken. Please choose another one.";
        }
        else {
            // good - insert into db 

            //use md5 for password
            // Otherwise, insert this user into the users table.
        $sql = "INSERT INTO users(fname, lname, username, password, cashBalance)
                VALUES('" . $fName . "','" . $lName . "','" . $username . "','" . $password . "','" . $cashBalance . "');";

                //echo $sql;
               // echo "<hr>";

        $results = $mysqli->query($sql);
        if(!$results) {
            echo $mysqli->error;
        }   
            
    }

        

    //if all cases pass then create user is successful - redirect to login
        //send to confirmation page with route to login


        //header("location: signUpConfirm.php");
        $mysqli->close();
    }

} //end isset if statement for user


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Confirmation | SportsOwl</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <h1 class="col-12 mt-4">User Registration</h1>
        </div> <!-- .row -->
    </div> <!-- .container -->

    <div class="container">

        <div class="row mt-4">
            <div class="col-12">
                <?php if ( isset($error) && !empty($error) ) : ?>
                    <div class="text-danger"><?php echo $error; ?></div>
                <?php else : ?>
                    <div class="text-success"><?php echo $_POST['username']; ?> was successfully registered.</div>
                <?php endif; ?>
        </div> <!-- .col -->
    </div> <!-- .row -->

    <div class="row mt-4 mb-4">
        <div class="col-12">
            <a href="login.php" role="button" class="btn btn-primary">Login</a>
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light">Back</a>
        </div> <!-- .col -->
    </div> <!-- .row -->

</div> <!-- .container -->

</body>
</html>