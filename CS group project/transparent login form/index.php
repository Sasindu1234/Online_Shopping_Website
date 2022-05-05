<?php


require_once ('dbget.php');
connect();
 
if(isset($_POST['submit']))
  {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM customer WHERE username ='$username' AND password ='$password'";
    $result = mysqli_query($conn, $query);
    if($result){
       $row  = $result->fetch_assoc();
    $count = $result->num_rows;
    if($count == 1){
      $_SESSION['user']      = $username;
          $_SESSION['id'] = $row['id'];
          $_SESSION['user_type'] = $row['user_type'];
      header('Location: page1.php');
      }
    }
    else{
      echo 'your username and password is invalid';
    }
  }
?>





<html>
  <head>
    <
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="header.css">
  </head>
  <body>
    <?php
    require_once ('headerlog.php');
     ?>

<?php if(isset($_SESSION['user'])): ?>
  <?php header("Location:index.php"); ?>
  <?php else : ?>
<div class="login-box">
  <h1>Login</h1>

  <form  action="index.php" method="post">
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="username" id="username" placeholder="Username">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" id="password" name="password" placeholder="Password">
  </div>

  <input type="submit" class="btn"  name="submit" value="Log in">
</form>
</div>
<?php endif; ?>
  </body>
</html>
