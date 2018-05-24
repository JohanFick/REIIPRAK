<?php

include_once 'LOG.php';
include_once 'connect_DB.php';
echo "<br>";
echo "User: ".$_SESSION['user_id']." is now logged out";

//header("Location:index.html");//back to index page
$id = $_SESSION['user_id'];
$delete_login = "Delete from login Where User_ID = '$id';";

// remove all session variables
$_SESSION= array();

$result = $conn->query($delete_login) or trigger_error($conn->error." [$delete_login]");
$conn->close();
?>