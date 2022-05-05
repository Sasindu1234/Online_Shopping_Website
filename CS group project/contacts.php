<?php 

session_start();
require_once ('component.php');

include 'database/dbget.php';
if (isset($_POST['question'])){
            
          
        if (isset($_SESSION['user_id'])){
            
            $customerid = $_SESSION['user_id'];
            $username = $_SESSION['user'];
            $feed = $_POST['feedback'];
            $rating =$_POST['rating'];
            $qustion  = $_POST['Qustion'];
            if($feed  == ""||$rating == "" )
      {     
           echo "<script>alert('Please give some feedback')</script>";
      }
         
        else{
              connect();
              

            $feed = $_POST['feedback'];
            $rating =$_POST['rating'];
            $qustion  = $_POST['Qustion'];
           
              $sql = "INSERT INTO `qustion`(`cus_id`, `cus_name`, `feedback`, `rating`, `que`) VALUES ('$customerid','$username','$feed','$rating','$qustion')";
              $result = mysqli_query($conn, $sql);
              echo "<script>alert('Your Qustion and Feedback are sent')</script>";
               echo "<script>window.location = 'contacts.php'</script>";
            }
        }
        else{
             echo "<script>alert('please log in first')</script>";
             echo "<script>window.location = 'login.php'</script>";
                        }

    
    
       

}



?>



<html>
<head>
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="Css/home.css">
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    
    table{
      display: table;
      border-collapse: separate;
      border-spacing: 2px;
      border-color: gray;
    }
    td,th{
      padding: 15px;
    }
    table.center{
      margin-left: auto;
      margin-right: auto;
    }

  </style>
</head>
<body style="background: url('images/back.jpg') fixed;">
      
	<header style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(images/1.jpg)">
		<div class="main">
		<nav>
            <ul>
				 <?php if(isset($_SESSION['user'])): ?>
        <li ><a href="page1.php">Home</a></li>
        <li><a href="menlg.php">Men</a></li>
        <li><a href="womanlg.php">Woman</a></li>
        <?php else : ?>
        <li><a href="page1.php">Home</a></li>
        <li><a href="Man.php">Men</a></li>
        <li><a href="woman.php">Woman</a></li>
        <?php endif; ?>
				
			</ul>
		</nav>
		</div>
		<div class="main">
		<nav>

			<ul style="float:right;">
         <?php if(isset($_SESSION['user'])): ?>
        <li><a href="logout.php">Logout</a></li>
        <?php else : ?>
           <li><a href="signin.php">SignUp</a></li>
         <li><a href="login.php">Log in</a></li>
        <li class="active"><a href="contacts.php">Contact us</a></li>
        <?php endif; ?>
        
				<li><a href="cart.php">  
                    <i class="fa fa-shopping-cart"></i> Cart
                    <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>

                    </a>
                </li>
			</ul>
		</nav>
		
		</div>
		<div class="title1">
			<h1>Wearme </h1>
			
		</div>

		
	 </header>

		

		


<!----comment---->

        <div class="testimonial">
        	<div class="small-container">
        		<div class="row">
        	<?php
               connect();
               $sql = "SELECT * FROM qustion";
              $result = mysqli_query($conn, $sql);

             if(mysqli_num_rows($result) > 0){
             while ($row = mysqli_fetch_assoc($result)){
                ?>
                   <div class="col-3">
                        <i class="fa fa-quote-left" ></i>
                        <h3>Qustion:</h3>
                        <p><?php echo $row["que"]; ?></p>
                        <h3>Answers :</h3>
                        <p><?php echo $row["answ"]; ?></p>
                        <h3><?php echo $row["cus_name"]; ?></h3>
                        <div class="rating">
                          <?php if($row["rating"]=="5"): ?>

                             <i class="fa fa-star" ></i>
                             <i class="fa fa-star" ></i>
                              <i class="fa fa-star" ></i>
                              <i class="fa fa-star" ></i>
                             <i class="fa fa-star" ></i>
                 
                          <?php elseif($row["rating"] == "4"): ?>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star-o"></i>
                         <?php elseif($row["rating"] == "3"): ?>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star" ></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        <?php endif; ?>
                     </div>
           
                   
                    </div>
                    

                <?php    
                }
               }
            ?>		


        		</div>
        	</div>
          <!--------Qustion----->
          <form method="post" action="contacts.php">
            <table class ="center" >
              <tr>
                <th colspan="2">Your Qustion and Feedback</th>
              </tr>
                  <tr>
                     <td><h3>Qustion</h3> </td>
                     <td><textarea name="Qustion" rows="5" cols="30" placeholder="Type here"></textarea></td>
                   </tr>
                  <tr>
                     <td><h3>Feedback</h3></td>
                     <td><textarea name="feedback" rows="20" cols="50" placeholder="What are you think about our service"></textarea></td>
                   </tr>
                   <tr>
                     <td><h3>Rating</h3></td>
                     <td><input type="number" name="rating" min="0" max="5"></td>
                   </tr>
                   <tr>
                     <td colspan="2"><input type="submit" name="question" value="submit" class="btn"> </td>
                     
                   </tr>
                 </table>

            
            
          </form>

        	<!-----footer---->
        	<div class="footer">
        		<div class="container">
        			<div class="row">
        				<div>
        					<h3>Online shopping</h3>
        					<ul>
        						<li><a href="Man.php">Men</a></li>
				                <li><a href="woman.php">Woman</a></li>
				                
        					</ul>
        				</div>
        				<div >
        					<h3>Keep in touch</h3>
        					<ul>
        						<li><a href="">Facebook</a></li>
				                <li><a href="#">Twitter</a></li>
				                <li><a href="#">Instagram</a></li>
        					</ul><br>
        					<h3>Conact us</h3><br>
        					<h3>Tel:no</h3>
        					  <p>071-2442752</p>
        				</div>

        			</div>
        		</div>
        	</div>