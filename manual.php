<!DOCTYPE html>
<html>

<head>



	<meta charset="UTF-8">

	<!-- If IE use the latest rendering engine -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Set the page to the width of the device and set the zoon level -->
	<meta name="viewport" content="width = device-width, initial-scale = 1">

	<?php
		require "header.php";
	?>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>





	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>





	<script src="js/tooltipglossary.js"></script>



	<script src="js/lightswitch.js"></script>
	<link id="generalcss" href="css/light.css" rel="stylesheet" type="text/css" />
	<title>Past Master</title>
	<link rel="icon" href="img/hourglass.jpg"><!--https://i.imgur.com/46g2q5s.png-->
</head>

<body>


	<nav id="mynavbar" class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<form class="navbar-form navbar-left" action="includes/logout.inc.php" method="post">
					<button class="btn btn-primary" type="submit" name="logout_submit">Logout</button>
				</form>	
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
          <li class="active">
						<a href="#">Manual</a>
					</li>
					<li>
						<a href="jump.php">Jump</a>
					</li>


					<!-- <li><a href="#" onclick="lightswitch()">Invert Colors</a></li> -->
				</ul>

			</div>
		</div>
	</nav>





	<div class="row">
		<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
			<br>
			<br>
			<br>
			<br>
			<img src="https://i.imgur.com/F0qoeiT.jpg" class="img-responsive center-block">







			<br>
			<h2 class="text-left">Past Master</h2>
			<br>
			<p class="text-left">Congratulations. Humanity has avoided extinction, and mastered time travel.</p>
			<br>
      <p class="text-left">As a user, there is no need to concern yourself with the details of how the technology works any more than you need to know the inner workings of your phone. Given that you've already drank the nanites required in our complementary glass of water, the setup has been completed, so no need to worry about that.</p>
      <br>
      <p>This interface has been provided for you to ease travel. Simply select the departure and arrival dates, and press jump. In case your run out of fuel, all you have to do is get a full night's rest.</p>
      <br>
      <p>Oh, and try to avoid carnivorous dinosaurs. The invulnerability shield is still in testing phase.</p>
	
			

					<br><br><br><br><br><br><br><br><br><br><br><br>


		</div>
	</div>


</body>

</html>