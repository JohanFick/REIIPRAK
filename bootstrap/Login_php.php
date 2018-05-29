<?php

if (isset($_POST['submit'])){

	include_once 'connect_DB.php';
	//set initial user eq to 0
	//this is to prevent user from inserting code into the form;
	$quser_id = mysqli_real_escape_string($conn,$_POST['User_ID']);
	$quser_password = mysqli_real_escape_string($conn,$_POST['User_password']);

	
	//select database query
	$sql1 = "use reii414_practical_db;";
	
	if ($conn->query($sql1) === TRUE) {
    echo "Database selected succesfully";
	echo "<br>";
	
	//mysqli_free_result($sql1);
       } 
else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
	echo "<br>";
}

// check query to see if password and username exists
	$sql_check_exists = "SELECT User_ID ,User_password from userprofile where userprofile.User_ID = '$quser_id' AND userprofile.User_password = '$quser_password';";
	$sql_get_name = "SELECT User_FName,User_LName from userprofile,u where u.User_ID = '$quser_id';";
	
	
	$reslultcheck = mysql_query($conn,$sql_check_exists);
	$User_FLName = mysql_query($conn,$sql_get_name);
	
	
	if(isset($reslultcheck) && $reslultcheck!=null)
				{
	$checkpass = mysql_num_rows($reslultcheck);
				}
				else {
					$checkpass = 0;
					}
	if($checkpass === 0){
		echo "cresidentials not found";
		
			
	} else {
		
			
			// 4. Release returned data 
			//mysqli_free_result($reslultcheck); //decition made the resultset can be cleared
				
			 
				//Apply login action
				
			$sql_login = "INSERT INTO login (User_ID,User_password) VALUES ('$quser_id','$quser_password');";

			
			if ($conn->query($sql_login) === TRUE) 
				{
			echo "LOGIN WAS SUCCESFULL YAAAAA";
			echo "<br>";
				} 
			else {
			echo "Error: " . $sql_login . "<br>" . $conn->error;
			echo "<br>";
				}
			//header("location:complete.html");//redirect back to main page
			if(isset($sql_login) && $sql_login!=null)
				{
			//mysqli_free_result($sql_login);
				}
		
	}
	
	echo "$User_FLName";
		
		

$conn->close();

}
else {
	//header("location:index.html");//redirect back to main page
	echo "submit falure";
}
    //header("location:complete.html");//redirect back to main page
	exit();



?>