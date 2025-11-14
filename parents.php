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
	<b><p><?php echo"Welcome<br>". $_SESSION['username'];?></p></b>
<center>
	<form method="POST"class="was-validated mt-3 w-50"style="background-color: skyblue;border-radius: 8px;">
		<h3><u><b>CRUD Parents</b></u></h3>
		parent_id:<input type="number" name="id" class="form-control"required>
		pfname:<input type="text" name="fname" class="form-control"required>
		plname:<input type="text" name="lname"class="form-control"required>
		pgender:<select name="sex" class="form-control">
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>
		phonenumber:<input type="tel" name="parent" class="form-control"required>
		district:<input type="text" name="district" class="form-control"required><br><br>
		<button type="submit" name="save"class="btn btn-primary">INSERT</button>
	</form>
	<?php
	if (isset($_POST['save'])) {
		$id=$_POST['id'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$gender=$_POST['sex'];
		$parent=$_POST['parent'];
		$district=$_POST['district'];
		$con=mysqli_connect('localhost','root','','trainees_info_management');
		$check=mysqli_query($con,"select * from parents where Nationalparentid='$id'");
		$fetch=mysqli_fetch_array($check);
		if (is_array($fetch)) {
			// code...
			echo "well";
		}
		else{
			$insert=mysqli_query($con,"insert into parents values('$id','$fname','$lname','$gender','$parent','$district')");
			if ($insert) {
				// code...
				echo "well";
			}
			else{
				echo "no";
			}
		}
	}
	?>
	<table border="1"class="table table-bordered">
		<tr style="background-color:chocolate;">
			<th>ParentNationalId</th><th>Parent_Fname</th><th>Parent_Lname</th><th>Parent_Gender</th><th>PhoneNumber</th><th>District</th><th>Action</th>
		</tr>
		<?php
	$con=mysqli_connect('localhost','root','','trainees_info_management');
$sel=mysqli_query($con,"select * from parents");
while ($ft=mysqli_fetch_array($sel)) {
	?>
	<tr>
		<td><?php echo $ft['Nationalparentid'];?></td>
		<td><?php echo $ft['pfname'];?></td>
		<td><?php echo $ft['plname'];?></td>
		<td><?php echo $ft['pgender'];?></td>
		<td><?php echo $ft['phone'];?></td>
		<td><?php echo $ft['district'];?></td>
		<td><a href="deleteparents.php?aa=<?php echo $ft['Nationalparentid'];?>">Delete</a>
		<a href="updateparents.php?ab=<?php echo $ft['Nationalparentid'];?>">Update</a></td>
	</tr>
	<?php
}
		?>
	</table>
</center>
</body>
</html>
