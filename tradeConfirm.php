<?php

require "config.php";




//check user has submitted form as opposed to just getting to page
if ( isset($_POST["team_id"]) && isset($_POST["shares"]) ) {
    //user attempted to login - check for two more cases

    //1. validate - make sure user entered user name and pass
        if(  empty($_POST["team_id"]) || empty($_POST["shares"]) ) {
            $error = "Please fill out all field inputs!";
        }


        else {

        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ( $mysqli->errno ) {
            echo $mysqli->error;
            exit();
        }

        $userId = $_SESSION['user_id'];
        $teamId = $_POST["team_id"];
        $teamPrice = $_POST["price"];
        $quantity = $_POST["shares"];
        $name = $_POST["teamName"];
        $total = $quantity * $teamPrice;
        $_SESSION["cashBalance"] = $_SESSION["cashBalance"] - $total;
        $newBal = $_SESSION["cashBalance"];


        // echo "<hr>";
        // echo $teamId;
        // echo "<hr>";
        // echo $userId;
        // echo "<hr>";
        // echo $teamPrice;
        // echo "<hr>";
        // echo $quantity;
        // echo "<hr>";
        // echo $name;

//change DB to adjust type and date
$sql_insert = "INSERT INTO transactions (users_id, teams_id, quantity, price) VALUES (?, ?, ?, ?);";
$statement = $mysqli->prepare($sql_insert);


$statement->bind_param("iiid", $userId, $teamId, $quantity, $teamPrice);
$executed = $statement->execute();
        //return false if error
        if(!$executed) {
        echo $mysqli->error;

        exit();
        }
//ELSE so update cash balance run????

        //var_dump($statement->affected_rows);
        // If succesful, $statement->affected_rows will return 1
        if($statement->affected_rows == 1) {
        $tradeComplete = true;
        }
        else {
            $error = "unable to execute trade!";
        }
    

    //UPDATE USER CASH BALANCE
        $sql_update = "UPDATE users SET cashBalance = ? WHERE id = ?;";
        $updateStatement = $mysqli->prepare($sql_update);

        $updateStatement->bind_param("di", $newBal, $userId);
        $updateExecute = $updateStatement->execute();
        if(!$updateExecute) {
        echo $mysqli->error;

        exit();
        }

    $statement->close();


    $mysqli->close();


// if (!isset($_POST['team']) || empty($_POST['team']) ) {
//     //error
// }
// else {
//     $team = $_POST['team'];
// }


        }

    }

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trade Confirmation | SportsOwl</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <h1 class="col-12 mt-4">Trade Confirmation</h1>
        </div> <!-- .row -->
    </div> <!-- .container -->

    <div class="container">

        <div class="row mt-4">
            <div class="col-12">
                <?php if ( isset($error) && !empty($error) ) : ?>

                    <div class="text-danger">
                        <?php echo $error; ?>
                    </div>

                <?php else : ?>

                <table class="table table-responsive">

                    <tr>
                        <th class="text-right">Team:</th>
                        <td><?php echo $name; ?></td>
                    </tr>

                    <tr>
                        <th class="text-right">Price:</th>
                        <td>$<?php echo $teamPrice; ?></td>
                    </tr>

                    <tr>
                        <th class="text-right">Shares:</th>
                        <td><?php echo $quantity; ?></td>
                    </tr>

                    <tr>
                        <th class="text-right">Total Cost:</th>
                        <td>$<?php echo $total ?></td>
                    </tr>

                     <tr>
                        <th class="text-right">Updated Cash Balance:</th>
                       <!-- <td>$<?php echo $_SESSION["cashBalance"] - $total;?></td> -->
                       <td>$<?php echo $newBal;?></td>
                    </tr>

                </table>
            <?php endif; ?>

            </div> <!-- .col -->
        </div> <!-- .row -->

    <div class="row mt-4 mb-4">
        <div class="col-12">
            <a href="Home.php" role="button" class="btn btn-primary">Home</a>
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light">Back</a>
        </div> <!-- .col -->
    </div> <!-- .row -->

</div> <!-- .container -->

</body>
</html>