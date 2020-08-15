<?php
include("../subscriber/conn.php");

extract($_POST);

$query="INSERT INTO contact_us(name,email,message) values('".$name."','".$email."','".$message."')";

mysqli_query($connect, $query);
/*
function function_alert($msg) {
	echo "<script type='text/javascript'>alert('$msg');</script>";
}


if(!$result){
	function_alert("Something went wrong").$mysqli->error;

}
function_alert("Thanks for contacting us");

$mysqli->close();
*/

?>