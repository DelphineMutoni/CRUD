<?php
session_start();
$ab=$_GET['aa'];
$con=mysqli_connect('localhost','root','','trainees_info_management');
$dele=mysqli_query($con,"delete from parents where Nationalparentid='$ab'");
if ($dele) {
	header("location:parents.php");
}
else{
	header("location:parents.php");
}
?>