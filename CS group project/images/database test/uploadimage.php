<!DOCTYPE html>
<html>
<head>
	<title>uploade image</title>
</head>
<body>
	<center>
		<h1>upload and insert</h1>

		<form action="" method="POST" enctype="multipart/form-data">
			<label>Choose an profile pic:</label><br>
			<input type="file" name="image" id="image"/><br>

			<label>Enter user name:</label><br>
			<input type="text" name="username" placeholder="enter" /><br>

			<label>Enter designation:</label><br>
			<input type="text" name="designation" placeholder="enter des" /><br>

			<input type="submit" name="upload" value="upload image/Data"/><br>
		</form>

	</center>

</body>
</html>

<?php 

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'student');

if(isset($_POST['upload']))
{
	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	$username = $_POST['username'];
	$designation = $_POST['designation'];
	$query = "INSERT INTO empimage(image,username,designation) VALUES ('$file','$username','$designation')";
	
	$result = mysqli_query($connection,$query);

	if($result)
	{
		echo '<script type="text/javascript"> alert("image upload") </script>';

	}

	else 
	{
		echo '<script type="text/javascript"> alert("image not upload") </script>';
	}
}
?>