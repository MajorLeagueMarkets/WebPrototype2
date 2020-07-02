<?php 
require "config.php";
//session_start();

// DB Connection.
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
  echo $mysqli->connect_error;
  exit();
}
$mysqli->set_charset('utf8');


//code to populate teams drop down
$sql = "SELECT name as team, price FROM teams;";

$results_teams = $mysqli->query($sql);

// check that no errors occurred when quesry is submitted. $results will return null if an error occured
if ( !$results_teams ) {
  echo $mysqli->error;
  //exit the program if there is an error. No reason to continue on
  exit();
}


$mysqli->close();

?>
<!DOCTYPE html>
<html>
<head>

	<title>Prices</title>
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
      <li class="nav-item">
        <a class="nav-link" href="Home.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="trade.php">Trade</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rankings.php">Records</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="prices.php">Prices <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="about.php">About </a>
      </li>
  </div>
</nav> 
<!-- END NAV BAR -->



<!-- HEADER -->
<div class="container">
<div class="row">
  <div class="header">
    <img src="other_files/sportsOwl.jpeg">
      <div class="hover">
        <marquee behavior="scroll" direction="right">
          <h3 class="hoverText"> Welcome to the stock market of sports! </h3>
        </marquee>
      </div>
    <p><strong>Team Prices</strong></p>
  </div> 
</div>
</div>
<!-- end header -->


<table id="pricesTable">
  <thead>
      <tr>
        <th>Team</th>
        <th>Price</th>
      </tr>
  </thead>

  <tbody>
       <?php while($row = $results_teams->fetch_assoc() ) : ?>

          <tr>
            <td><?php echo $row["team"];?></td>
            <td><?php 
            echo "$";
            echo $row["price"];
            ?>
            </td>
          </tr>
        <?php endwhile;?>

  </tbody>
</table>





<!-- Bootstrap JS files (optional but required for some compnents like modal and navmenu) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>