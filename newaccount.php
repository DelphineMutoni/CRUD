<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<center>
	<form method="POST"class="was-validated mt-3 w-50"style="background-color: skyblue;border-radius: 8px;">
		<h3><u><b>CREATE ACCOUNT</b></u></h3>
		Username:<input type="text" name="user"class="form-control"required>
		Password:<input type="password" name="pass"class="form-control"required>
		<button type="submit" name="save" class="btn btn-secondary">Create_account</button>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="loginp.php">Sign_in</a>
	</form>
	<?php
	if (isset($_POST['save'])) {
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$con=mysqli_connect('localhost','root','','trainees_info_management');
		$check=mysqli_query($con,"select * from login where password='$pass'");
		$fetch=mysqli_fetch_array($check);
		if (is_array($fetch)) {
			echo "already exist";
		}
		else{
		$qry=mysqli_query($con,"insert into login values('$user','$pass')");
		if ($qry>0) {
			echo "well";
		}
		else{
			echo "no";
		}
}
	}
	?>
</center>
</body>
</html>