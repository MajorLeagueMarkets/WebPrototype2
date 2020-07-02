
<nav class="container-fluid bg-light p-2">
    <div class="row">
        <div class="col-12 d-flex">
 
 	<!-- if user is not logged in dont show the login link  -->
         <?php if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"] ) :?>
          	<?php
          		header('location: login.php');
          	?>
            <a class="text-center p-2 ml-auto" href="login.php">Login</a>
 		<!-- else if means user is logged in so show user nad lougout link -->
 		<?php else: ?>

            <div class="text-center p-2 ml-auto">Hello <?php echo $_SESSION["username"];   ?>!</div>
 
            <a class="text-center p-2" href="logout.php">Logout</a>

        <?php endif; ?>
 
        </div>
    </div> <!-- .row -->
</nav>