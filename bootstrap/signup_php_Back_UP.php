<?php
if (isset($_POST['submit'])){

	include_once 'connect_DB.php';
	$quser_id = mysqli_real_escape_string($conn,$_POST['User_ID']);
	$quser_type = mysqli_real_escape_string($conn,$_POST['User_Type']);
	$quser_fname = mysqli_real_escape_string($conn,$_POST['User_FName']);
	$quser_lname = mysqli_real_escape_string($conn,$_POST['User_LName']);
	$quser_age= mysqli_real_escape_string($conn,$_POST['User_Age']);
	$quser_sex = mysqli_real_escape_string($conn,$_POST['User_sex']);
	$quser_telephone = mysqli_real_escape_string($conn,$_POST['User_Telephone']);
	$quser_streetadress = mysqli_real_escape_string($conn,$_POST['User_StreetAddress']);
	$quser_password = mysqli_real_escape_string($conn,$_POST['User_password']);

	echo 'xxxxxxxxxxxxxxxxxxxxx';
	
	
	$sql1 = "use reii414_practical_db;";
	//$sql2 = "DELETE from userprofile;";
	$sql2 = "INSERT INTO userprofile (User_ID,User_Type,User_FName,User_LName,User_Age,User_sex,User_Telephone,User_StreetAddress,User_password) VALUES ('$quser_id','$quser_type','$quser_fname','$quser_lname','$quser_age','$quser_sex','$quser_telephone','$quser_streetadress','$quser_password');";
	
	
	
	
	
	if ($conn->query($sql1) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

echo'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\n';
$resultset = mysqli_query("select max(User_ID)  from userprofile;");
$field1 = mysql_fetch_object($result)->field1;
echo $field1;
	echo'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx\n';
	
	if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}

$conn->close();

}
else {
	header("location:index.html");//redirect back to main page
}
    header("location:complete.html");//redirect back to main page
	exit();



?>