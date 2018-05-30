<?php

session_start();

if(isset($_POST['submit'])){
	include_once 'connect_DB.php';
	
	
	$quser_id = mysqli_real_escape_string($conn,$_POST['User_ID']);
	$quser_password = mysqli_real_escape_string($conn,$_POST['User_password']);
	
	$hased_pass = password_hash($quser_password,PASSWORD_DEFAULT);
	//may this user log in
	
	//Error handlers
	//check for empty fields
	if (empty($quser_id) || empty($quser_password)){
		//header("Location:error.php?login=error");
		echo "EMPTY ERROR";
		exit();
		
	}else{
		
		
		$sql = "SELECT * FROM userprofile WHERE User_ID = '$quser_id';";
		//$result = mysqli_query($conn,$sql);
		//$rr = mysqli_num_rows($result);
		$result = $conn->query($sql) or trigger_error($conn->error." [$sql]"); /* I have added the suggestion from Your Common Sence */
		echo $result->num_rows;

		

			
		
		if ($result->num_rows < 1 ){ 
			header("Location:error.php?login=exists");
			echo "Username does not exist";
			
			
		} else{
			$row = $result->fetch_assoc();
			echo $row['User_password'];
			echo $row['User_ID'];
			if (true){
				//udo hash
				echo "first if";
				$hasedpwdchecker = password_verify($quser_password,$row['User_password']);
				if($hasedpwdchecker == false){
					header("Location:error.html?login=error");
					
					exit();
					
				} elseif($hasedpwdchecker == true){
					//login here
					//create session variable
					
					$_SESSION["user_id"] = $row['User_ID'];
					echo ">>>>";
					echo $row['User_ID'];
					$hased_pass = password_hash($quser_password,PASSWORD_DEFAULT);
					
					$sql_login = "INSERT INTO login (User_ID,User_password) VALUES ('$quser_id','$hased_pass');";
					
					$queryresult = $conn->query($sql_login) or trigger_error($conn->error." [$sql_login]");
					//becarefull of a closed connection (cause of could not fetch mysqli in line....);
					if($row['User_Type'] == 'A' )
					{
						header("Location:index.html?admin");
						
					}
					else if($row['User_Type'] == 'S')
					{
						header("Location:studenthome.html?studentloggedon");
						
					}
					else if($row['User_Type'] == 'I')
					{
						header("Location:instructorhome.html?");
						
					}
					
					$conn->close();
					
				}
				
			}
			
			
			
			
		}
	}
		
		
	} 
	
	
	
	




?>
