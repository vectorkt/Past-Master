<?php




echo '<p>You really shouldnt be here</p>';










if(isset( $_POST['signup_submit'])){
	
	require 'dbh.inc.php';
	
	
	$email = $_POST['email'];
	$password = $_POST['pass'];
	$passwordRepeat = $_POST['passrep'];
	

	
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		echo '<p>1</p>';
		header("Location: ../index.php?error=invalidmail");
		exit();
		
	}
	

	
	else if($password !== $passwordRepeat){
		
		echo '<p>2</p>';
		header("Location: ../index.php?error=passwordcheck");
		exit();
				
	}
	
	
	
	else{
		$query= "SELECT * FROM users WHERE email=?";
		$statement = mysqli_stmt_init($conn);
		
		
		if(!mysqli_stmt_prepare($statement,$query)){
			header("Location: ../index.php?error=sqlerror");
			exit();
		}
		
		
		
		else{
			mysqli_stmt_bind_param($statement,"s",$email); //s how many parameters are passed, ss for username and password
			mysqli_stmt_execute($statement);
			mysqli_stmt_store_result($statement);
			$resultCheck = mysqli_stmt_num_rows($statement);
			if($resultCheck>0){
				
				header("Location: ../index.php?error=emailtaken");
				exit();
				
			}
			else{
				
				
				$query="INSERT INTO users(email,pwd,fuel) VALUES (?,?,?)";
				$statement = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($statement,$query)){
					header("Location: ../index.php?error=sqlerror");
					exit();
					
				}
				else{
					//INSERT USER
					$hashedPwd = password_hash($password,PASSWORD_DEFAULT);
					$fuel=10000;
					mysqli_stmt_bind_param($statement,"ssi",$email, $hashedPwd,$fuel);
					mysqli_stmt_execute($statement);
					
					
					
					
					
					$query= "SELECT uid FROM users WHERE email=?";
					
					$statement = mysqli_stmt_init($conn);
		
		
					mysqli_stmt_prepare($statement,$query);
					mysqli_stmt_bind_param($statement,"s",$email); //s how many parameters are passed, ss for username and password
					mysqli_stmt_execute($statement);
					$result = mysqli_stmt_get_result($statement);
					$row=mysqli_fetch_assoc($result);
					
					session_unset(); 
					session_destroy();
					session_start();
					$_SESSION['uid']=$row['uid'];
					//header("Location: ../manual.php?signup=".$row['uid']);
					/**/
					
					
					//BUILD JUMP LOG
					$query= "CREATE TABLE JL".$_SESSION['uid']." (
													JID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
													departureDate varchar(255) NOT NULL,
													departureLocation varchar(255) NOT NULL,
													arrivalDate varchar(255) NOT NULL,
													arrivalLocation varchar(255) NOT NULL,
													paradox varchar(3) NOT NULL
												)";
					
					$statement = mysqli_stmt_init($conn);
		
		
					
					//mysqli_stmt_bind_param($statement,"s",$email); //s how many parameters are passed, ss for username and password
					mysqli_stmt_prepare($statement,$query);
					mysqli_stmt_execute($statement);
					
					header("Location: ../manual.php?signup=success");
					/**/
						
						
						
								
					
					
					
					
					//header("Location: ../manual.php?signup=success");
					exit();					
					 
					
				}
				
			}
		}
		
	}
	
	mysqli_stmt_close($statement);
	mysqli_close($conn);
	
	
}	

else{
	header("Location: ../index.php?=nosubmit");
	exit();
	
}
	
	
	

	
	
	
	
	
	
	
	
?>


