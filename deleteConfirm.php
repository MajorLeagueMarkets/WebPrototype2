<?php
require "config.php";

// if (isset($_SESSION["user_id"]) ) {
// echo $_SESSION["user_id"];
// }

// else {
//     echo "user id not in session";
// }

//if user is already logged in, kick them and dont let them login again
if( isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true ) {

    header("Location: home.php");

}



//check user has submitted form as opposed to just getting to page
if ( isset($_POST["username"]) && isset($_POST["password"]) ) {
    //user attempted to login - check for two more cases

    //1. validate - make sure user entered user name and pass
        if(  empty($_POST["username"]) || empty($_POST["password"]) ) {
            $error = "Please fill out all field inputs!";
        }


        else {

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ( $mysqli->errno ) {
            echo $mysqli->error;
            exit();
        }


        //$userId = $_SESSION['user_id'];



        //CHECK IF USERNAME EXISTS

        //grab user id
        $sql_id = "SELECT id FROM users WHERE username = '" . $_POST["username"] . "'";
        $results_id = $mysqli->query($sql_id)->fetch_object()->id;
         if ( !$results_id ) {
            echo $mysqli->error;
            //exit the program if there is an error. No reason to continue on
            exit();
        }
        $id = $results_id;

        //DELETE TRANSACTIONS FIRST AND THEN DELETE USER

        $sql_delete_trades = "DELETE FROM transactions WHERE users_id = '" . $id . "'";
        $sql_delete = "DELETE FROM users WHERE username = '" . $_POST["username"] . "'";

        //submit the query via PHP MySQLi
        //delete trades first then delete user
        $results_trade = $mysqli->query($sql_delete_trades);
    
        if ( !$results_trade ) {
            echo $mysqli->error;
            //exit the program if there is an error. No reason to continue on
            exit();
        }
        $results_delete = $mysqli->query($sql_delete);

        // check that no errors occurred when quesry is submitted. $results will return null if an error occured
        if ( !$results_delete ) {
            echo $mysqli->error;
            //exit the program if there is an error. No reason to continue on
            exit();
        }
 
            
    }



        //header("location: signUpConfirm.php");
        $mysqli->close();
    

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
                    <div class="text-success"><?php echo $_POST['username']; ?> was successfully deleted.</div>
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