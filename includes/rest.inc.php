<?php



require 'dbh.inc.php';
		
$query= "UPDATE users SET fuel =10000 WHERE uid=?";


$statement = mysqli_stmt_init($conn);
mysqli_stmt_prepare($statement,$query);
mysqli_stmt_bind_param($statement,"s",$_GET['cuid']);
mysqli_stmt_execute($statement);


//mysqli_close($conn);					




/*
require 'dbh.inc.php';
		
$query= "INSERT INTO test (departureDate,departureLocation,arrivalDate,arrivalLocation,paradox) 
		VALUES (?,?,?,?,'no')";
					
$statement = mysqli_stmt_init($conn);


mysqli_stmt_prepare($statement,$query);
mysqli_stmt_bind_param($statement,"ssss",$_GET['departureDate'],$_GET['departureLocation'],$_GET['arrivalDate'],$_GET['arrivalLocation']);
mysqli_stmt_execute($statement);
/**/

/*
header('Location: jump.php=logged sucessfully' );
/**/


/*
echo '<p>You really shouldnt be here</p>';


require 'dbh.inc.php';
	
$query= "INSERT INTO jl".$_SESSION['uid']." (departureDate,departureLocation,arrivalDate,arrivalLocation,paradox) 
		VALUES (?,?,?,?,no)";
					
$statement = mysqli_stmt_init($conn);


mysqli_stmt_prepare($statement,$query);
mysqli_stmt_bind_param($statement,"ssss",$departureDate,$departureLocation,$arrivalDate,$arrivalLocation);
mysqli_stmt_execute($statement);

header('Location: jump.php=logged sucessfully' );
	
	/**/
	
	
	
	
	
?>


