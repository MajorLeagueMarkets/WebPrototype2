<?php 
session_start();
// // header("Access-Control-Allow-Origin: *");
// // header("Access-Control-Allow-Credentials: true");
// // header("Access-Control-Allow-Methods: GET");
// // Define a constant for the API endpoint
// define("RANK_API_ENDPOINT", "https://api.sportsdata.io/v3/nba/scores/json/Standings/2020?key=f7ef4fe182c047afb1d1458538da21f4");
// // Initialize curl
// $curl = curl_init();
// // Set some curl options
// curl_setopt($curl, CURLOPT_URL, RANK_API_ENDPOINT);
// // Verifies the authenticity of the peer's SSL certificate
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// // Returns the data instead of printing it to the page
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// // Execute curl, aka make a HTTP request
// $response = curl_exec($curl);
// echo "<hr>";
// var_dump($response);
// // Convert this string to php assoc array
// echo "<hr>";
// $response = json_decode($response, true);
// var_dump($response);
// echo "<hr>";
// echo $response["resultCount"];
// echo "<hr>";
// echo $response["results"][0]["collectionName"];

// // close curl
// curl_close($curl);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rankings</title>
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
      <li class="nav-item ">
        <a class="nav-link" href="Home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="trade.php">Trade</a>
      </li>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="rankings.php">Records<span class="sr-only">(current)</span></a>
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
      <div class="hover">
        <marquee behavior="scroll" direction="right">
          <h3 class="hoverText"> Welcome to the stock market of sports! </h3>
        </marquee>
      </div>
    <p><strong>NBA RECORDS</strong></p>
  </div> 
</div>
</div>
<!-- end header -->


<table id="rankingsTable">
	<thead>
		  <tr>
		    <th>Team</th>
		    <th>Record</th>
		    <th>Win %</th> 
        <th>Points Per Game</th> 

		  </tr>
  </thead>
  
  <tbody>
		  <tr>
		  <!--   <td>1</td>
		    <td>Los Angeles Lakes</td>
		    <td>13-3</td>
        <td>%</td> -->
		  </tr>
  </tbody>

</table>


<!-- Bootstrap JS files (optional but required for some compnents like modal and navmenu) -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="rankings.js"></script>
</body>
</html>