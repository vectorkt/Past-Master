<!DOCTYPE html>
<html>

<head <meta charset="UTF-8">

    <!-- If IE use the latest rendering engine -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Set the page to the width of the device and set the zoon level -->
    <meta name="viewport" content="width = device-width, initial-scale = 1">


    <?php
		require "header.php";
		require 'includes/dbh.inc.php';
	?>




    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">

    </script>





    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <script src="https://code.jquery.com/jquery-1.12.4.js">

    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">

    </script>





    <script src="js/tooltipglossary.js">

    </script>


    <script src="https://code.jquery.com/jquery-1.12.4.js">

    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js">

    </script>
    <script>


        $( function() {

			$( "#departureDate" ).datepicker({
			dateFormat: 'dd/mm/yy',
			showButtonPanel: true,
			
			changeYear: true,
			yearRange: '-3000:3000',
			
			 });

			$( "#arrivalDate" ).datepicker({
			dateFormat: 'dd/mm/yy',
			showButtonPanel: true,
			
			changeYear: true,
			yearRange: '-3000:3000',
			
			});
		} );

  
  function paradox(){
	  
	  
	  
	  var currentID = "<?php echo $_SESSION['uid'] ?>";
	  JID=$("#paradoxJID").val();
	  htmlJID="#JID"+JID;
	  
	  //alert(JID+"\n"+htmlJID+"\n"+$(htmlJID).text());
	  
	  if($(htmlJID).text()==""){
		  
		  alert("No such jump");
		  
	  }
	  
	  else{
		  
		  if($(htmlJID).text()=="no"){
			  $.ajax({
				url:'includes/paradox.inc.php',
				method:'get',
				data:{  
						cuid:currentID,
						JID:JID,
						paradoxStatus:"yes"
					},
				success:function(data)
					{
					 alert("You have logged paradox succesfully");//alert("PHP Success1");
					},
				error:function(data)
					{
					alert("PHP Error1");
					}
				});
			  
			  
		  }
		  else if($(htmlJID).text()=="yes"){
			 
				$.ajax({
				url:'includes/paradox.inc.php',
				method:'get',
				data:{  
						cuid:currentID,
						JID:JID,
						paradoxStatus:"no"
					},
				success:function(data)
					{
					 alert("You have logged paradox succesfully");//alert("PHP Success1");
					},
				error:function(data)
					{
					alert("PHP Error1");
					}
				});
			 
			 
			  
			  
		  }
		  
		setTimeout(location.reload.bind(location), 1000);  
	  }
	  
	  //alert("Still works!");
	  
	  
  }
  
  
  function rest(){

    //$("#fuelYears").text(10000);
	
	var currentID = "<?php echo $_SESSION['uid'] ?>";
	
	$.ajax({
	url:'includes/rest.inc.php',
	method:'get',
	data:{  
			cuid:currentID
				
	},
	success:function(data)
		{
		alert("You have rested succesfully");//alert("PHP Success");
		},
	error:function(data)
		{
		alert("PHP Error3");
		}
	});	
	
	setTimeout(location.reload.bind(location), 1000);
	//alert("You have rested succesfully");

  }

   function lastArrivalFunk(){
	  
	  if($("#lastArrival").text()!=""){
		  alert($("#lastArrival").text());
		  lastArrivalString=$("#lastArrival").text();
		  lastArrivalArray=lastArrivalString.split("/");
		  lastArrivalDate=new Date();
		  lastArrivalDate.setFullYear(lastArrivalArray[2],lastArrivalArray[1],lastArrivalArray[0]-1)
		  lastArrivalBool=true;
		  
		  alert(lastArrivalDate);
	  }
	  else{
		  
		  alert("No last Arrival");
		  
	  }
	  
	  
	 if(typeof(lastArrivalDate)!=='undefined'){
		 
		 alert("there is a last arrival date");
		 
	 }
	 else{
		 
		 alert("there is no last arrival date");
		 
	 }
	  
	  
  }

  

  function jump(){
  
  
  milisecondsPerYear=1000*60*60*24*365;
  
  fuel = milisecondsPerYear * parseFloat( $("#fuelYears").text() );

  before = fuel;

  departureDateString = $("#departureDate").val();

  arrivalDateString = $("#arrivalDate").val();
  
  

  if(departureDateString == "" ||  arrivalDateString == "" || $("#departureLocation").val()=="" || $("#arrivalLocation").val()==""){

    alert("Cannot have empty input");

  }
  
  
  
  
 
  

  else{

  
  //dd mm  yyyy
  
  
  departureArray = departureDateString.split("/");

  arrivalArray = arrivalDateString.split("/");

  
  departure = new Date();
  departure.setFullYear(departureArray[2],departureArray[1],departureArray[0]-1);

  arrival = new Date();
  arrival.setFullYear(arrivalArray[2],arrivalArray[1],arrivalArray[0]-1);
  
  if($("#lastArrival").text()!=""){
	  //alert($("#lastArrival").text());
	  lastArrivalString=$("#lastArrival").text();
	  lastArrivalArray=lastArrivalString.split("/");
	  lastArrivalDate=new Date();
	  lastArrivalDate.setFullYear(lastArrivalArray[2],lastArrivalArray[1],lastArrivalArray[0]-1)
	  lastArrivalBool=true;
	  
	  //alert(lastArrivalDate);
  }
  else{
	  
	  //alert("No last Arrival");
	  
  }
  
  
 if(typeof(lastArrivalDate)!=='undefined'){
	 
	 //alert("there is a last arrival date");
	 
 }
 else{
	 
	 //alert("there is no last arrival date");
	 
 }

 
 
 
  
  
  


  fuel_required=Math.abs(departure.getTime()-arrival.getTime())

  if(typeof(lastArrivalDate)!=='undefined' && (departure.getTime()-lastArrivalDate.getTime())<0){
	  
	  alert("You can't leave before your last arrival");
	  
	  
  }
  
  else if(fuel<fuel_required){

    alert("Not enough fuel, please recharge");

  }
  
  else{

 

    fuel = fuel-fuel_required;
   

    $("#fuelYears").text(fuel/milisecondsPerYear);

   

	fuelString=(fuel/milisecondsPerYear).toString();
	
	//alert(fuel+typeof(fuelString)+fuelString);
	
	var currentID = "<?php echo $_SESSION['uid'] ?>";
	
	//alert(typeof(currentID));
	
	$.ajax({
	url:'includes/jump.inc.php',
	method:'get',
	data:{  
			cuid:currentID,
			departureDate:departureDateString,
			departureLocation:$("#departureLocation").val(),
			arrivalDate:arrivalDateString,
			arrivalLocation:$("#arrivalLocation").val()
				
	},
	success:function(data)
		{
		 alert("You have jumped succesfully");//alert("PHP Success1");
		},
	error:function(data)
		{
		alert("PHP Error1");
		}
	});
	
	$.ajax({
	url:'includes/updateFuel.inc.php',
	method:'get',
	data:{  
			cuid:currentID,
			fuel:fuelString
				
	},
	success:function(data)
		{
		 //alert("You have updated succesfully");//alert("PHP Success");
		},
	error:function(data)
		{
		alert("PHP Error2");
		}
	});	
	
	
	setTimeout(location.reload.bind(location), 500);
	//setTimeout(alert("You have jumped succesfully"), 1001);
	
	
  }

  }

  }
	</script>


    <script src="js/lightswitch.js">

    </script>
    <link id="generalcss" href="css/light.css" rel="stylesheet" type="text/css" />
    <title>Past Master</title>
    <link rel="icon" href="https://i.imgur.com/46g2q5s.png">
</head>

<body>


    <nav id="mynavbar" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <form class="navbar-form navbar-left" action="includes/logout.inc.php" method="post">
                    <button class="btn btn-primary" type="submit" name="logout_submit">Logout</button>
                </form>
                <!-- <a class="navbar-brand" href="#">Seedless Bloom</a> -->
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="manual.php">Manual</a>
                    </li>
                    <li class="active">
                        <a href="#">Jump</a>
                    </li>

                    <!-- <li><a href="#" onclick="lightswitch()">Invert Colors</a></li> -->
                </ul>

            </div>

        </div>
    </nav>





    <div class="row">
        <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
            <br><br><br>

			<form class="form-inline">
			<input type="button"  class="btn btn-primary"  value="Rest" onclick="rest()">
            <p class="myInline"> &nbsp;&nbsp;Years Of Fuel Left: </p>
            <p class="myInline" id="fuelYears">


                <?php  
			
					$query= "SELECT * FROM users WHERE uid=?";
					
					$statement = mysqli_stmt_init($conn);
					
					
					mysqli_stmt_prepare($statement,$query);
					mysqli_stmt_bind_param($statement,"s",$_SESSION['uid']); //s how many parameters are passed, ss for username and password
					mysqli_stmt_execute($statement);
					$result = mysqli_stmt_get_result($statement);
					$row=mysqli_fetch_assoc($result);
					echo $row['fuel'];
			
				?>
            </p>
			
            
			</form>
            <br>
            <!--<input type="button" value="Last Arrival" onclick="lastArrivalFunk()"> -->
            <br>
            
            <br>
			
			
			
			<form  class="form-inline" >
			<div class="form-group myInline">
				<input type="text" class="form-control" id="departureDate" placeholder="Departure Date...">
				<input type="text" class="form-control" id="arrivalDate" placeholder="Arrival Date...">
			</div>
			</form>
			
            <br>
			<form  class="form-inline" >
			<div class="form-group">
            <input type="text" class="form-control" id="departureLocation" placeholder="Departure Location...">
            
			
            <input type="text"  class="form-control" id="arrivalLocation" placeholder="Arrival Location...">
            </div>
			</form>
			
			
			<br>
            <input type="button"  class="btn btn-primary"  value="Jump" onclick="jump()">
            <br><br><br>
			<form class="form-inline">
			<input type="button"  class="btn btn-primary" value="Change Jump Paradox" onclick="paradox()">
            <input type="text" class="form-control" id="paradoxJID" placeholder="Jump number..">
            <br>
            
            <br><br><br>
            <div class="myScrollable">
                <table class="table-responsive">
					<thead>
                    <tr>
                        <th>Jump&nbsp;&nbsp;</th>
                        <th>Departure Date&nbsp;&nbsp;</th>
                        <th>Departure Location&nbsp;&nbsp;</th>

                        <th>Arrival Date&nbsp;&nbsp;</th>
                        <th>Arrival Location&nbsp;&nbsp;</th>
                        <th>Paradox</th>
                    </tr>
					</thead>
					<div>
                    <?php
			
				$query="SELECT * FROM jl".$_SESSION['uid'];
				$result = mysqli_query($conn,$query);
				
				$jumpIDS=array();
				
				$departureDates=array();
				$departureLocations=array();
				
				$arrivalDates=array();
				$arrivalLocations=array();
				
				$paradoxes=array();
				
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){
						
						
						array_push($jumpIDS,$row['JID']);
						
						array_push($departureDates,$row['departureDate']);
						array_push($departureLocations,$row['departureLocation']);
						
						array_push($arrivalDates,$row['arrivalDate']);
						array_push($arrivalLocations,$row['arrivalLocation']);
						
						array_push($paradoxes,$row['paradox']);
						
						
						
						
					}
					$size=count($jumpIDS)-1;
					//echo "<p>".$size."<p>";
					
					//JUMP ID
					
					for($i=$size;$i>=0;$i--){
						echo "<tr>";

						echo "<td>".$jumpIDS[$i]."</td>";
						echo "<td>".$departureDates[$i]."</td>";
						echo "<td>".$departureLocations[$i]."</td>";
						
						if($i==$size){
							echo "<td id='lastArrival'>".$arrivalDates[$i]."</td>";
							//echo "<td>".$arrivalDates[$i]."</td>";
						}
						else{
							echo "<td>".$arrivalDates[$i]."</td>";
						
						}
						
						echo "<td>".$arrivalLocations[$i]."</td>";
						echo "<td id='JID".$jumpIDS[$i]."'>".$paradoxes[$i]."</td>";
						echo "</tr>";
					}
					
					
					
				}
			
			
			
			?>
					<div>
				
				</table>

            </div>



        </div>
    </div>


</body>

</html>