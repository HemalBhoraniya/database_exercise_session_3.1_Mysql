<?php
$host = 'localhost';
$usernm = 'root';
$pswd = '';
$db="mydb";
$conn =new mysqli($host,$usernm,$pswd,$db);

if($conn->connect_error){
	die("\n Connection failed: " . $conn->connect_error);
}
?>