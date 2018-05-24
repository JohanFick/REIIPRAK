<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = 'reii414_practical_db';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "<br>";
	
} 
echo "Connected successfully";

//select database query
		$sql1 = "use reii414_practical_db;";
	
		if ($conn->query($sql1) === TRUE) {
		echo "Database selected succesfully";
		echo "<br>";
		} 	else{
					echo "Error: " . $sql1 . "<br>" . $conn->error;
					echo "<br>";
				}

// Johan Check
//check burger


?>