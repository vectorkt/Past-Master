<?php



if(isset($_POST['login_submit'])){
	
	require 'dbh.inc.php';
	
	$email = $_POST['loginEmail'];
	$password = $_POST['loginPwd'];

	
	
	
	if(empty($email) || empty($password)){
		header("Location: ../index.php?error=emptyfields");
		exit();
		
	}
	else{
		$query = "SELECT * FROM users WHERE email=?;";
		$statement = mysqli_stmt_init($conn);
		
		if(!mysqli_stmt_prepare($statement,$query)){
			header("Location: ../index.php?error=queryerror");
			exit();
			
		}
		
	
	else{
		
		
		mysqli_stmt_bind_param($statement,"s",$email);
		mysqli_stmt_execute($statement);
		$result = mysqli_stmt_get_result($statement);
		if($row = mysqli_fetch_assoc($result)){
			$pwdCheck = password_verify($password,$row['pwd']);
			if($pwdCheck==false){
				header("Location: ../index.php?eror=wrongpwd");
				exit();
				
			}
			else if($pwdCheck==true){
				session_unset(); 
				session_destroy();
				session_start();
				$_SESSION['uid'] = $row['uid'];
				
				
				header("Location: ../manual.php?login=success");
				exit();
				
				
			}
			else{
				
				header("Location: ../index.php?error=wrongpwd");
				exit();
				
			}
			
		}
		else{
			header("Location: ../index.php?error=nouser");
			exit();
		}
		
		
	}
	
	
	
}

}
else{
	header("Location ../index.php");
	exit();
	
}
	
	
	
	
	
	
	
	
	
	
	
	
?>


