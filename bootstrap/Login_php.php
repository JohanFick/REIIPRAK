<?php
echo "xx";
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
       } 
else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
	echo "<br>";
}
	$sql_check_exists = "SELECT User_ID ,User_password from userprofile where userprofile.User_ID = '$quser_id' AND userprofile.User_password = '$quser_password';";
	
	$reslultcheck = mysql_query($conn,$sql_check_exists);

	
	
	if (mysqli_num_rows($reslultcheck) != 0)
	{
		 echo "User name and or password is not matching";
		header("location:index.html");//redirect back to main page
	} 
	else {
		
		
				//Apply login action
			$sql_login = "INSERT INTO userprofile (User_ID,User_password) VALUES ('$quser_id','$quser_password');";

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
		
		
		
}
	


$conn->close();

}
else {
	//header("location:index.html");//redirect back to main page
	echo "submit falure";
}
    //header("location:complete.html");//redirect back to main page
	exit();



?>