<?php 
require "config.php";

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        if ( $mysqli->errno ) {
            echo $mysqli->error;
            exit();
        }

$portfolioBalance = "SELECT cashBalance FROM users WHERE username = '" . $_SESSION["username"] . "'";

$results_portfolio = $mysqli->query($portfolioBalance);
$_SESSION["cashBalance"] = $results_portfolio->fetch_assoc()["cashBalance"];
// check that no errors occurred when quesry is submitted. $results will return null if an error occured
if ( !$results_portfolio) {
  echo $mysqli->error;
  //exit the program if there is an error. No reason to continue on
  exit();
}



$sqlTrades = "SELECT teams.name as team, quantity as shares, teams.price as price FROM transactions 
  JOIN teams
    ON transactions.teams_id = teams.teamID
  WHERE users_id = '" . $_SESSION["user_id"] . "'";

$results = $mysqli->query($sqlTrades);

        if(!$results) {
        echo $mysqli->error;

        exit();
        }




$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>

	<title>Home</title>
	<!-- Required meta tags for Bootstrap-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS file -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	 <!-- Link to CSS sheet -->
	<link href="final.css" rel="stylesheet">



	
</head>
<body>
  <?php include 'navLogin.php'; ?>

	<!-- NAV BAR - CREATE SEPERATE FILE AND INCLUDE ON EACH PAGE -->
<nav class="navbar navbar-expand-md navbar-light myNav">
  <a class="navbar-brand" href="Home.php">
    <img src="other_files/MainLogo.jpeg" width="50" height="50" class="d-inline-block align-top">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Home.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="trade.php">Trade</a>
      </li>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="rankings.php">Records</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="prices.php">Prices</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
  </div>
</nav> 
<!-- END NAV BAR -->


<!-- HEADER -->
<div class="container">
<div class="row">
  <div class="header">
    <img src="other_files/sportsOwl.jpeg">
          <!-- <img src="transparent.png"> -->
      <div class="hover">
        <marquee behavior="scroll" direction="right">
          <h3 class="hoverText"> Welcome to the stock market of sports! </h3>
        </marquee>
      </div>
  </div> 
</div>
</div>
<!-- end header -->




<!-- ACCOUNT INFO SECTION -->
<div class="container">
  <div class="row">
      <div class="col col-12 col-md-6"> 
          <h3 id="userJS"> 
            <?php 
            echo "Hello, ";
            echo $_SESSION["username"];
            ?>
            
          </h3>
        <p id="balance">
            <?php 
            echo "Your cash balance is: $";
            echo round($_SESSION["cashBalance"],2);
            ?>
        </p>
      </div> <!-- end description -->
      <div class="col col-12 col-md-6">
        <img src="other_files/nba.png">
      </div> 
  </div> <!-- row -->
</div> <!-- end container -->


<table id="portfolio">
  <tr>
    <th>Team</th>
    <th>Shares</th>
    <th>Price</th>
    <th>Total Cost</th>
  </tr>


  <!-- <tr>
    <td>NYK</td>
    <td>10</td>
    <td>$15.00</td>
    <td>$150.00</td>
  </tr> -->
  <?php while($row = $results->fetch_assoc() ) : ?>

          <tr>
            <td><?php echo $row["team"];?></td>
            <td><?php echo $row["shares"];?></td>
            <td><?php 
            echo "$";
            echo $row["price"];
            ?>
            </td>
            <td><?php 
            echo "$";
            echo $row["price"] * $row["shares"];
            ?>
          </tr>
        <?php endwhile;?>

  
</table>





<!-- Bootstrap JS files (optional but required for some compnents like modal and navmenu) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
  


</script>

</body>
</html>