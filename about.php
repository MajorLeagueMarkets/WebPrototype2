<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>

	<title>About</title>
	<!-- Required meta tags for Bootstrap-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS file -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- FONT -->
  <link href="https://fonts.googleapis.com/css?family=Cinzel:400,900&display=swap" rel="stylesheet">

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
      <li class="nav-item ">
        <a class="nav-link" href="prices.php">Prices</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="about.php">About <span class="sr-only">(current)</span></a>
      </li>
  </div>
</nav> 
<!-- END NAV BAR -->



<!-- HEADER -->
<div class="container">
<div class="row">
  <div class="header">
    <img src="other_files/sportsOwl.jpeg">
    <p class="summary"><strong> Welcome to the Stock Market of Sports! Where you can buy and sell sports teams just like stocks.  Invest in your favorite teams or bet on teams you think will outperform expectations! </strong> </p>
    <h8><a href="https://twitter.com/SportsOwlbets"><strong>Click me to learn more about SportsOwl Bets! </strong></a></h8>
  </div> 
</div>
</div>
<!-- end header -->


<!-- BIO -->
<div class="container">
  <div class="row">
    <div class="col col-md-6"> <!--hunter -->
      <img src="other_files/hunter.jpeg" class="rounded-circle">
      <h3> <a href="https://www.linkedin.com/in/hunter-reinhart-a2333a135/">Hunter Reinhart</a></h3>
      <h6> CEO and Founder</h6>
      <p> Aiming to obtain an investment and innovation position by using my future degree in Economics and Mathematics paired with my minors in Digital Entrepreneurship and Applied Analytics. I’m passionate about developing predictive models using data analytics that can provide companies the best possible advice and strategies to achieve financial success. </p>
    <form action="https://www.linkedin.com/in/hunter-reinhart-a2333a135/" method="get" target="_blank">
      <button type="submit" class="btn btn-primary">View more</button>
    </form>
    </div> <!-- end hunter -->


    <div class="col col-md-6"> <!--Ryan -->
      <img src="other_files/ryan.jpeg" class="rounded-circle">
      <h3> <a href="https://www.linkedin.com/in/ryan-chernus/">Ryan Chernus</a></h3>
      <h6> Web Developer </h6>
      <p> Ryan is graduating from the University of Southern California in May of 2020 with a degree in Business Administration, focusing on Finance, and a minor in Computer Programming. He will be entering the workforce as an analyst in San Francisco for JPMorgan in the middle market commercial banking field.</p>
    <form action="https://www.linkedin.com/in/ryan-chernus/" method="get" target="_blank">
      <button type="submit" class="btn btn-primary">View more</button>
    </form>
    </div> <!-- end ryan -->
  </div>






<!-- Bootstrap JS files (optional but required for some compnents like modal and navmenu) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>