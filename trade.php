<?php 
require "config.php";

// DB Connection.
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
  echo $mysqli->connect_error;
  exit();
}
$mysqli->set_charset('utf8');


//code to populate teams drop down
$sql_teams = "SELECT * FROM teams;";

$results_teams = $mysqli->query($sql_teams);

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

	<title>Trade</title>
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
  <a class="navbar-brand" href="=Home.php">
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
      <li class="nav-item active">
        <a class="nav-link" href="trade.php">Trade<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="rankings.php">Records</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="prices.php">Prices</a>
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
    <p><strong>PLACE A TRADE</strong></p>
  </div> 
</div>
</div>
<!-- end header -->




<!-- START AND EDIT FORM -->
  <div class="container">
    <!-- <form action="tradeConfirm.php" onsubmit="checkBalance();" method="POST" class="mt-3"> -->
    <form action="tradeConfirm.php" id="form" method="POST" class="mt-3">
      

       <!-- POPULATE WITH cash balance -->
      <div class="form-group row trade">
        <label for="cashBalance-id" class="col-sm-5 col-form-label text-sm-right">Your current cash balance: $
            <span id="cashBalance">
              <?php
                  echo round($_SESSION["cashBalance"],2);
               ?>
            </span>
        </label> 
      </div>
      <!-- TEAMS DROP DOWN -->
      <div class="form-group row trade">
        <label for="team-id" class="col-sm-3 col-form-label text-sm-right">Team:</label>
        <div class="col-sm-9">
          <select name="team_id" id="team-id" class="form-control">
            <option value="" selected>-- Select One --</option>
            <!-- Format dropsdown options here -->
              <?php while ($row = $results_teams->fetch_assoc() ) : ?>
                <option value = "<?php echo $row["teamID"]; ?>" data-price="<?php echo $row["price"]; ?>" data-teamname="<?php echo $row["name"]; ?>"> <?php echo $row["name"]; ?> </option>
              <?php endwhile; ?>

          </select>
        </div>
      </div> <!-- end form group row -->

 <!-- POPULATE WITH TEAMS SHARE PRICE -->
      <div class="form-group row trade">
        <label for="price-id" class="col-sm-5 col-form-label text-sm-right">Stock Price: 
            <span id="teamPrice">
              $0.00
            </span>
        </label> 
      </div>
        

<!-- BUY OR SELL RADIO BUTTONS -->
      <!-- <div class="form-group row trade">
        <label class="col-sm-5 col-form-label text-sm-right">BUY or SELL: </label>
        <div class="col-sm-7">
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" name="buySell" class="form-check-input" value="buy">
              BUY
            </label> -->
          <!-- </div> .form-check -->
          <!-- <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input type="radio" name="current-student" class="form-check-input" value="sell">
              SELL
            </label> -->
          <!-- </div> .form-check -->
        <!-- </div> -->
      <!-- </div> .form-group -->


<!-- NUMBER OF SHARES INPUT -->
<div class="form-group row trade">
  <label class="col-sm-5 col-form-label text-sm-right"># of Shares to purchase: </label>
  <div class="col-sm-7">
          <div class="form-check form-check-inline">
              <label for="shares">Shares (0-100):</label>
            <input type="number" id="shares" name="shares" min="0" max="100">
          </div>
      </div>
</div>

 <!-- POPULATE WITH TOTAL TRANSACTION PRICE -->
      <div class="form-group row trade total">
        <label for="total-id" class="col-sm-5 col-form-label text-sm-right">Total Transaction Price: 
          <span id="updateTotal">
            $0.00
          </span>
      </label> 
      </div>

      <div class="error-message"></div>

<!-- EXECUTE TRADE OR CLEAR -->
  <div class="form-group row">
          <div class="col-sm-12 mt-2">
            <input id="teamNameInput" name="teamName" type="hidden" value="0">
            <input id="priceInput" name="price" type="hidden" value="0">
            <button type="submit" class="btn btn-primary submitButton">Execute</button>
            <button type="reset" class="btn btn-light">Reset</button>
          </div>
        </div> <!-- .form-group -->


      </form>
    
  </div> <!-- .container -->








<!-- Bootstrap JS files (optional but required for some compnents like modal and navmenu) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
console.log()
let total = 0; 
$('#team-id').on('change', function() {
  let $selectedOption = $(this).find(":selected");
  let team_name = $selectedOption.data('teamname');
  team_price = $selectedOption.data('price');

  $('#teamPrice').html("$" + team_price);

  $('#priceInput').val(team_price);
  $('#teamNameInput').val(team_name);

})

$('#shares').on('change', function() {
  total = team_price * $(this).val();
  //total = total.toFixed(2);
  $('#updateTotal').html("$" + total.toFixed(2));
})


//reset
$("#form").on('reset',function() {
  let $selectedOption = $(this).find(":selected");
  let team_name = $selectedOption.data('teamname');
  team_price = $selectedOption.data('price');

  $('#teamPrice').html("$0.00");

  $('#priceInput').val(team_price);
  $('#teamNameInput').val(team_name);

  total = team_price * $(this).val();
  $('#updateTotal').html("$" + total.toFixed(2)) ;
})

//MAKE SURE YOU HAVE ENOUGH CASH TO PLACE TRADE

document.querySelector("#form").onsubmit = checkBalance;



function checkBalance(){

  event.preventDefault();

  //alert("hi");

  var balance = document.querySelector("#cashBalance").innerHTML;
  //alert(balance);

  var teamInput = document.querySelector("#team-id").value;
  var sharesInput = document.querySelector("#shares").value;
 
  console.log(total);
  console.log(balance);
  if(total > balance){
    alert("Trade amount exceeds your cash balance!! Please do not overspend!");
    // return false; 
  }
  else if (teamInput="" || sharesInput == 0) {
    alert("Must have team selected and number of shares to buy!");
  }
  else{
    // return true; 
    document.querySelector("#form").submit();
  }
}



// document.querySelector("#team-id").onSelect = function() {
//   document.querySelector("#teamPrice") = this.price;
// }

// $("#team-id").change(function(enter) {
//   console.log(this.children("option:selected"));
//   $("#teamPrice") = $(this).children("option:selected").val();
//   console.log($(this).children("option:selected"));
// });

// var option = null;
// var total = null;
// var teams = document.getElementById("team-id");
// // change price pending on team selected
// teams.onchange = function(enter) {
// option = teams.options[teams.selectedIndex];
// console.log(option.value);

// document.getElementById("teamPrice").innerHTML = "$" + option.value;
// };

// //update total price of transaction once number of shares is entered
// var shares = document.getElementById("shares");
// shares.onchange = function(enter) {
// var numShares = shares.value;
// total = option.value * numShares;
// totalDecimal = total.toFixed(2);
// document.getElementById("updateTotal").innerHTML = "$" + totalDecimal;

// };






</script>

</body>
</html>










