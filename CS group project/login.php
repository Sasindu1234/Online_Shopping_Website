
<?php 
require_once ('headerlog.php');

require_once ('database/dbget.php');

connect();

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from customer  where username='".$uname."'AND password='".$password."' limit 1";
    
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)==1){
          $_SESSION['user']      = $uname;
          $_SESSION['user_id'] = $row['cus_id'];
          $_SESSION['user_type'] = $row['cus_type'];
          $_SESSION['user_Brand']=$row['cus_fav'];
          $_SESSION['gender'] = $row['cus_gender'];
          $_SESSION['user_address'] = $row['cus_add'];
          $_SESSION['user_rgd'] = $row['cus_regdate'];


          echo "<script>alert('You Have Successfully Logged in...! ')</script>";
         if( $_SESSION['user_type'] == 1){
          echo "<script>window.location = 'login.php'</script>";
         }
        else{
          echo "<script>window.location = 'addmin.php'</script>";
        }

        
        exit();
    }

    else{
          echo "<script>alert('your username and password is invalid...!')</script>";
          echo "<script>window.location = 'login.php'</script>";

        exit();
    }
        
}

?>



<html>
<head>
    <title> Login Form in HTML5 and CSS3</title>
    <link rel="stylesheet" a href="Css/login.css">
    <link rel="stylesheet" a href="css\font-awesome.min.css">
</head>
<body style="background-image: url(images/Wearme_login.jpg)">
   
    <div class="container">
    
        <form method="POST" action="login.php">
            <div class="form-input">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder="Enter the User Name"/>  
            </div>
            <div class="form-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="password"/>
            </div>
            <input type="submit" name="submit" value="LOGIN" class="btn-login"/>
        </form>
    </div>
</body>
</html>
