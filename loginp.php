<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<script type="text/javascript"src="bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="css.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<center>
<form method="POST"style="background-color: skyblue;width: 30%;box-shadow: 2px 4px 1px 5px;border-radius: 8px;"class="was-validated">
	<h1><u>Login Form</u></h1>
	Username:<input type="text" name="user"placeholder="Enter username here...."class="form-control"required><br><br>
	Password:<input type="password" name="pass"placeholder="Enter password here...."class="form-control"required><br><br>
	<input type="submit" name="save"value="Login">
</center>
</form>
<?php
if (isset($_POST['save'])) {
$user=$_POST['user'];
$pass=$_POST['pass'];
$con=mysqli_connect('localhost','root','','trainees_info_management');
$qry=mysqli_query($con,"select* from login where username='$user' and password='$pass'");
$fetch=mysqli_fetch_array($qry);
if (is_array($fetch)) {
	$_SESSION['username']=$_POST['user'];

	header("location:parents.php");
}
else{
	echo "invalid username and password.Please try again!!!";
}
}
?>
</body>
</html>