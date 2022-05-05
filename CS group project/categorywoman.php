<?php 

session_start();
require_once ('component.php');

include 'database/dbget.php';



?>



<html>
<head>
    <title>Woman page</title>
    <link rel="stylesheet" type="text/css" href="Css/home.css">
    <link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background: url('images/back.jpg') fixed;">
      
    <header style="background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(images/1.jpg)">
        <div class="main">
        <nav>
            <ul>
                <li ><a href="page1.php">Home</a></li>
                <li><a href="Man.php">Men</a></li>
                <li class="active"><a href="woman.php">Woman</a></li>
                
            </ul>
        </nav>
        </div>
        <div class="main">
        <nav>

            <ul style="float:right;">
                <li><a href="signin.php">SignUp</a></li>
                <li><a href="login.php">Log in</a></li>
                <li><a href="contacts.php">Contact us</a></li>
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
            <h1>Wearme</h1>
           
        </div>

        
     </header>

        

        
<!----featured products---->
        <div class = "small-container">
            <h2 class="Title">Top Brands</h2>
            <div class="row">
                
            <?php
               connect();
               $sql = "SELECT * FROM item WHERE Item_cate = 'Denim' OR Item_cate = 'Skirt' OR Item_cate = 'Saree'";
              $result = mysqli_query($conn, $sql);

             if(mysqli_num_rows($result) > 0){
             while ($row = mysqli_fetch_assoc($result)){
                    echo '<div class="col-4">';
                    echo '<form action="fillcart.php" method="post">';
                    component($row["Item_des"], $row["Item_price"], $row["Item_pic"],$row["Item_rating"] ,$row["Item_code"]);

                    echo '</form>';
                    echo    '</div>';
                }
               }
            ?>
            
            </div>

            

        </div>
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
                        <p><?php echo $row["feedback"]; ?></p>
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
           
                    <img src="images/user-2.png">
                    <h3><?php echo $row["cus_name"]; ?></h3>
                    </div>
                    

                <?php    
                }
               }
            ?>      


                </div>
            </div>

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



        


    
</body>

</html>
