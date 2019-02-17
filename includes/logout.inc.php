<?php



if(isset($_POST['logout_submit'])){
	
	
	session_unset(); 
	session_destroy();
	header("Location: ../index.php");
	exit();
	

}
	
	
	
	
	
	
	
	
	
	
	
?>


