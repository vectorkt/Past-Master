<?php



require 'dbh.inc.php';
		
$query= "UPDATE jl".$_GET['cuid']." SET paradox=? where JID=? ";//VALUES (?,?,?,?,'no')";
					
$statement = mysqli_stmt_init($conn);



mysqli_stmt_prepare($statement,$query);
mysqli_stmt_bind_param($statement,"ss",$_GET['paradoxStatus'],$_GET['JID']);
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


