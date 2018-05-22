<?php

if(isset($_POST['submit'])){
	include_once 'connect_DB.php';
	$quser_id = mysqli_real_escape_string($conn,$_POST['User_ID']);
	$quser_password = mysqli_real_escape_string($conn,$_POST['User_password']);
	
	$hased_pass = password_hash($quser_password,PASSWORD_DEFAULT);
	//Error handlers
	//check for empty fields
	if (empty($quser_id) || empty($quser_password)){
		//header("Location:error.php?login=error");
		echo "EMPTY ERROR";
		exit();
		
	}else{
		$sql = "SELECT * FROM userprofile WHERE User_ID = '$quser_id';";
		$result = mysqli_query($conn,$sql);
		$rr = mysqli_num_rows($result);
		
		
		if (2 < 1 ){ 
			//header("Location:error.php?login=error");
			echo "user name or password incorrect poes burger";
			exit();
			
		} else{
			echo "first if";
			if ($row = mysqli_fetch_assoc($result)){
				//udo hash
				echo "first if";
				$hasedpwdchecker = password_verify($quser_password,$row['User_password']);
				if($hasedpwdchecker == false){
					header("Location:error.html?login=error");
					exit();
					
				} elseif($hasedpwdchecker == true){
					//login here
					//create session variable
					echo "go burger";
					$_SESSION['user_id'] = $row['User_ID'];
					
					$sql_login = "INSERT INTO login (User_ID,User_password) VALUES ('$quser_id','$hased_pass');";
					echo "yes yes yes";
					if ($conn->query($sql_login) === TRUE) 
						{
							echo "LOGIN WAS SUCCESFULL";
							echo "<br>";
						} 
			             else {
								echo "Error: " . $sql_login . "<br>" . $conn->error;
								echo "<br>";
							}
				
					
				}
			}
			
			
			
		}
	}
		
		
	} 
	
	
	
	




?>
