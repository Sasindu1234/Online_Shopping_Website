<?php
require_once ('database/dbget.php');

require_once ('headerlog.php');




if(isset($_POST['submit']))
  {   
      $name = $_POST['firstName'];
      $username = $_POST['Username'];
      $email = $_POST['email'];
      $password = $_POST['password1'];
      $password2 = $_POST['password2'];
      $register = $_POST['birthDate'];
      $address = $_POST['address'];
      $favourite = $_POST['favourite'];
      $Gender = $_POST['sex'];
      

      //validation
     if($name  == ""||$username == ""||$email == "" || $password == "" || $register == "" || $password2 == "" || $register  == ""||$address == ""||$favourite == "" || $Gender == ""  )
      {
           echo "<script>alert('Please Fill in all the fields')</script>";
      }
      else
      {
          if($password != $password2){
              echo "<script>alert('password do not match')</script>";
             
              header('Location:signin.php.php');
          }
          else{
               connect();
              $sql = "INSERT INTO `customer`( `cus_name`, `username`, `email`, `password`, `cus_add`, `cus_gender`, `cus_fav`, `cus_regdate`, `cus_type`) VALUES ('$name','$username','$email','$password','$address','$Gender','$favourite','$register','1')";
              $result = mysqli_query($conn, $sql);
              echo "<script>alert('You are registation Thank you!!!')</script>";
              }
          }
      }
  
?>







<!DOCTYPE html>
<html>
<head>
    <title>Registation</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="Css/sigin.css" rel="stylesheet" >

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


<!------ Include the above in your HEAD tag ---------->
</head>
<?php 
require_once ('headerlog.php');
?>
<body style="background: url('images/men.jpg') fixed;">
<div class="container">
            <form class="form-horizontal" role="form" method="POST" action="signin.php">
                <h2>Registration</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="firstName" id="firstName" placeholder="First Name" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Username" class="col-sm-3 control-label">User Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="Username" id="Username" placeholder="Last Name" class="form-control" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email* </label>
                    <div class="col-sm-9">
                        <input type="email"   id="email" placeholder="Email" class="form-control" name= "email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Password*</label>
                    <div class="col-sm-9">
                        <input type="password" name= "password1" id="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Confirm Password*</label>
                    <div class="col-sm-9">
                        <input type="password" name= "password2" id="password" placeholder="Password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="birthDate" class="col-sm-3 control-label">Registation Date *</label>
                    <div class="col-sm-9">
                        <input type="date" name="birthDate" id="birthDate" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        
                        <textarea name = "address" id="address" placeholder="" class="form-control" autofocus rows="4" cols="30"></textarea>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="favourite" class="col-sm-3 control-label">Favourite </label>
                    <div class="col-sm-9">
                                <select name="favourite">
                                    
                                    <option selected>Nike</option>
                                    <option selected>POLO</option>
                                    <option selected>Calvin Klein</option>
                                    <option selected>PUMA</option>
                                    <option selected>Gocoop</option>
                                    <option selected>Vero Moda</option>
                                </select>
                            
                            </div>
                        </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Gender</label>
                    <div class="col-sm-6">
                            <input type="radio"name="sex" id="femaleRadio" value="Female">Female
                            <input type="radio" name="sex" id="maleRadio" value="Male" checked="checked">Male
                     </div>
                            
                </div>
                   
                
                
                <button type="submit" class="btn btn-primary btn-block" name="submit" >Register</button>
            </form> <!-- /form -->
        </div> <!-- ./container -->
</body>
</html>