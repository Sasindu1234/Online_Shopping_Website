<?php 
   $msg="";
  if(isset($_POST['uplaod'])){

 $target= "images/".basename($_FILES['images']['name']);
 $db=mysqli_connect("localhost","root","","student")
 $image = $_FILES['image']['name'];
 $text = $_POST['text'];
 $sql ="INSERT INTO images(image,text) VALUES ('$image','$text')";
 mysqli_query($db,$sql);

 if(move_uploaded_file($_FILES['tmp_name']['name'], $target)){
 $msg="image upload successfully";
 }
 else{
 	$msg="there was a problem";
 }
  }


?>






<!DOCTYPE html>
<html>
<head>
	<title>image load
	</title>
</head>
<body>
	<div id="content">
		<form method="post" action="image1.php" enctype="multipart/form-data">
			<input type="hidden" name="size" value="1000000">
			<div>
				<input type="file" name="image">
			</div>
			<div>
				<textarea name="text" cols="40" rows="4" placeholder="sayvh j "></textarea>
			</div>
			<div>
				<input type="submit" name="uplaod" value = "upload image">
			</div>


			
		</form>

</body>
</html>