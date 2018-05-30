<?php
	session_start();
	
	echo $_SESSION['user_id'];
if (isset($_POST['submit'])){
	echo "button clicked";
	include_once 'connect_DB.php';

	
	$c_descript = mysqli_real_escape_string($conn,$_POST['c_descript']);
	
	$c_credit = mysqli_real_escape_string($conn,$_POST['c_credit']);
	$c_start = mysqli_real_escape_string($conn,$_POST['c_start']);
	$c_end = mysqli_real_escape_string($conn,$_POST['c_end']);
	$User_ID = $_SESSION['user_id'];
	//echo $_SESSION['user_id'];
	
	//Insert form data query
	$sql_add_course = "INSERT INTO courses (Course_Ins_ID,Course_DSPT,Course_Credits,Course_Start,Course_End) VALUES ('$User_ID','$c_descript','$c_credit','$c_start','$c_end');";
	
	
	if ($conn->query($sql_add_course) === TRUE) {
    echo "New course created successfully";
	echo "<br>";
	} 
	else {
    echo "Error: " . $sql_add_course . "<br>" . $conn->error;
	echo "<br>";
}


$conn->close();

}
else {
	//header("location:error.html");//redirect back to main page
}
    header("location:complete.html?course-added");//redirect back to main page
	exit();



?>