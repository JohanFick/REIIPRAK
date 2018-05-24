<?php
echo "errorsssssssssssssssss"
	include_once 'connect_DB.php';
	$quser_id = mysqli_real_escape_string($conn,$_POST['User_ID']);
	$quser_password = mysqli_real_escape_string($conn,$_POST['User_password']);
	
	$hased_pass = password_hash($quser_password,PASSWORD_DEFAULT);
 


?>