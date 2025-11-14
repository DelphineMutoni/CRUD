<?php
session_start();
$ab=$_GET['ab'];
$con=mysqli_connect('localhost','root','','trainees_info_management');
$select=mysqli_query($con,"select * from parents where Nationalparentid='$ab'");
$fetch=mysqli_fetch_array($select);
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
	<form method="POST"class="was-validated mt-3 w-50">
		<h3><u><b>CRUD Parents</b></u></h3>
		pfname:<input type="text" name="fname" class="form-control" value="<?php echo $fetch['pfname'];?>"required>
		plname:<input type="text" name="lname"class="form-control"value="<?php echo $fetch['plname'];?>"required>
		pgender:<select name="sex" class="form-control"value="<?php echo $fetch['pgender'];?>">
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>
		phonenumber:<input type="tel" name="parent" class="form-control"value="<?php echo $fetch['phone'];?>"required>
		district:<input type="text" name="district" class="form-control"value="<?php echo $fetch['district'];?>"required>
		<button type="submit" name="save"class="btn btn-primary">Update</button>
	</form>
<?php
	if (isset($_POST['save'])) {
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$gender=$_POST['sex'];
		$phone=$_POST['parent'];
		$district=$_POST['district'];
		$con=mysqli_connect('localhost','root','','trainees_info_management');
		$update=mysqli_query($con,"update parents set pfname='$fname',plname='$lname',pgender='$gender',phone='$phone',district='$district' where Nationalparentid='$ab'");
		if ($update) {
			header("location:parents.php");
		}
		else{
			header("location:updateparents.php");
		}
	}
?>