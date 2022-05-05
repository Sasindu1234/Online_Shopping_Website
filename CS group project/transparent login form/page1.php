<?php 

session_start();
require_once ('component.php');

include 'dbget.php';

if (isset($_POST['add'])){
    /// print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'page1.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

    
   

?>



<html>
<head>
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
      
	<header>
		<div class="main">
		<nav>
            <ul>
				<li class="active"><a href="#">Home</a></li>
				<li><a href="Man.php">Men</a></li>
				<li><a href="#">Woman</a></li>
				
			</ul>
		</nav>
		</div>
		<div class="main">
		<nav>

			<ul style="float:right;">
				<li><a href="#">Log in</a></li>
				<li><a href="#">Contact us</a></li>
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
			<h1>Some words </h1>
			<p>kbfdsn<br>skbfd</p>
		</div>

		
	 </header>

		

		
<!----featured products---->
        <div class = "small-container">
        	<h2 class="Title">Top Brands</h2>
        	<div class="row">
        	<?php
               connect();
               $sql = "SELECT * FROM item WHERE Item_cate = 'Top Brands'";
              $result = mysqli_query($conn, $sql);

             if(mysqli_num_rows($result) > 0){
             while ($row = mysqli_fetch_assoc($result)){
                    component($row["Item_des"], $row["Item_price"], $row["Item_pic"],$row["Item_rating"] ,$row["Item_code"]);
                }
               }
            ?>
            </div>
<!----Deals--->
            <h2 class="Title"> Deals</h2>
        	<div class="row">
        	<?php
               connect();
              connect();
               $sql = "SELECT * FROM item WHERE Item_cate = 'Top Brands'";
              $result = mysqli_query($conn, $sql);

             if(mysqli_num_rows($result) > 0){
             while ($row = mysqli_fetch_assoc($result)){
                    component($row["Item_des"], $row["Item_price"], $row["Item_pic"],$row["Item_rating"],$row["Item_code"]);
                }
               }
            ?>	
            </div>

        </div>
<!----comment---->

        <div class="testimonial">
        	<div class="small-container">
        		<div class="row">
        			<div class="col-3">
        				<i class="fa fa-quote-left" ></i>
        				<p>hhcbhbscjhbsscnnnnnnnnnnjnbjhxsbx<br>niushsuygasyv</p>
        				<div class="rating">
        				<i class="fa fa-star" ></i>
        				<i class="fa fa-star" ></i>
        				<i class="fa fa-star" ></i>
        				<i class="fa fa-star" ></i>
        				<i class="fa fa-star-o"></i>
        			</div>
        			<img src="images/user-1.png">
        			<h3>Sasindu rashmina</h3>
        			</div>

        			<div class="col-3">
        				<i class="fa fa-quote-left" ></i>
        				<p>hhcbhbscjhbsscnnnnnnnnnnjnbjhxsbx<br>niushsuygasyv</p>
        				<div class="rating">
        				<i class="fa fa-star" ></i>
        				<i class="fa fa-star" ></i>
        				<i class="fa fa-star" ></i>
        				<i class="fa fa-star" ></i>
        				<i class="fa fa-star-o"></i>
        			</div>
        			<img src="images/user-2.png">
        			<h3>Sasindu rashmina</h3>
        			</div>

        			<div class="col-3">
        				<i class="fa fa-quote-left" ></i>
        				<p>hhcbhbscjhbsscnnnnnnnnnnjnbjhxsbx<br>niushsuygasyv</p>
        				<div class="rating">
        				<i class="fa fa-star" ></i>
        				<i class="fa fa-star" ></i>
        				<i class="fa fa-star" ></i>
        				<i class="fa fa-star" ></i>
        				<i class="fa fa-star-o"></i>
        			</div>
        			<img src="images/user-3.png">
        			<h3>Sasindu rashmina</h3>
        			</div>
        		</div>
        	</div>

        	<!-----footer---->
        	<div class="footer">
        		<div class="container">
        			<div class="row">
        				<div>
        					<h3>Online shopping</h3>
        					<ul>
        						<li><a href="#">Men</a></li>
				                <li><a href="#">Woman</a></li>
				                <li><a href="#">Kids</a></li>
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
