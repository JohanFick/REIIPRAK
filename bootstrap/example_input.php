<?php
		include_once 'connect_DB.php';
	//set initial user eq to 0
	
	$input_link = mysqli_real_escape_string($conn,$_POST['files']);
	
	if(isset($input_link))
	{
		echo $input_link;
		
		$myfile = fopen($input_link, "r") or die("Unable to open file!");
		echo fread($myfile,filesize($input_link));
		fclose($myfile);

	}











?>