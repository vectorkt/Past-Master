<!DOCTYPE html>
<html>

<?php
	require "header.php";
?>




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
    <link rel="icon" href="https://i.imgur.com/46g2q5s.png">
</head>





<body>





    <nav id="mynavbar" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
			
				<form class="navbar-form navbar-left" action="includes/login.inc.php" method="post">
                    <div class="form-group">
					<input class="form-control" type="text"  placeholder="E-mail..." name="loginEmail">
                    <input class="form-control" type="password"  placeholder="Password..." name="loginPwd">
                    </div>
					<button class="btn btn-primary" type="submit" name="login_submit">Login</button>
                </form>
                
				
            </div>
        </div>
    </nav>





    <div class="row">
        <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">


            <br><br><br><br><br><br><br>
            <form class="text-center" action="includes/signup.inc.php" method="POST">
               
                <input class="form-control" type="text" placeholder="E-mail..." name="email">
                <br>
                
                <input class="form-control" type="password" placeholder="Password..."name="pass">
                <br>
                <input class="form-control" type="password" placeholder="Password Confirmation..." name="passrep">
                <br>
				<br>
                <input class="btn btn-primary" type="submit" name="signup_submit" value="Sign up">
            </form>



        </div>
    </div>





</body>

</html>