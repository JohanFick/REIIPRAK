<?php
if (isset($_POST['submit'])){

	include_once 'connect_DB.php';
	//set initial user eq to 0
	
	$quser_type = mysqli_real_escape_string($conn,$_POST['User_Type']);
	$quser_fname = mysqli_real_escape_string($conn,$_POST['User_FName']);
	$quser_lname = mysqli_real_escape_string($conn,$_POST['User_LName']);
	$quser_age= mysqli_real_escape_string($conn,$_POST['User_Age']);
	$quser_sex = mysqli_real_escape_string($conn,$_POST['User_sex']);
	$quser_telephone = mysqli_real_escape_string($conn,$_POST['User_Telephone']);
	$quser_streetadress = mysqli_real_escape_string($conn,$_POST['User_StreetAddress']);
	$quser_password = mysqli_real_escape_string($conn,$_POST['User_password']);
	
	//select database query
	$sql1 = "use reii414_practical_db;";
	
	if ($conn->query($sql1) === TRUE) {
    echo "Database selected succesfully";
	echo "<br>";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
	echo "<br>";
}

	// get max User_ID here
if ($result=mysqli_query($conn,"select max(User_ID)  from userprofile;"))
  {
  // Fetch one and one row
  $row=mysqli_fetch_row($result);
    
		echo $row[0];
		$quser_id = $row[0]+1;
		echo "<br>";
		
    
  // Free result set
  mysqli_free_result($result);
}



	
	
	//$sql2 = "DELETE from userprofile;";
	//Insert form data query
	$sql2 = "INSERT INTO userprofile (User_ID,User_Type,User_FName,User_LName,User_Age,User_sex,User_Telephone,User_StreetAddress,User_password) VALUES ('$quser_id','$quser_type','$quser_fname','$quser_lname','$quser_age','$quser_sex','$quser_telephone','$quser_streetadress','$quser_password');";
	
	
	if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
	echo "<br>";
	} 
	else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
	echo "<br>";
}

$conn->close();

}
else {
	header("location:index.html");//redirect back to main page
}
    header("location:complete.html");//redirect back to main page
	exit();



?>