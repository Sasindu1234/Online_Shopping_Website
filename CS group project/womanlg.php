<?php 

require_once ('component.php');

include 'database/dbget.php';

?>



<html>
<head>
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="Css/home.css">
	<link rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background: url('images/back.jpg') fixed;">
      
	<?php
    require_once ('headerlog.php');
?>

		

		
<!----Categories---->
       <div class = "small-container">
            <h2 class="Title">Categories</h2>
            <div class="row">
            <div class="col-4">
                    <a href="categorywoman.php"><img src="Upload/Saree/Saree-1.jpg"></a>
                    <h4 style="font-family: cursive"><b>SAREE</b></h4>
                    <p></p>
                </div>

                <div class="col-4">
                    <a href="categorywoman.php"><img src="Upload/Skirt/Skirt-1.jpg"></a>
                    <h4 style="font-family: cursive"><b>SKIRT</b></h4>
                    <p></p>
                </div>

                <div class="col-4">
                    <a href="categorywoman.php"><img src="Upload/Denim/Denim-1.jpg"></a>
                    <h4 style="font-family: cursive"><b>DENIM</b></h4>
                    <p></p>
                </div>

            </div>
        </div>
<!----your favourite---->
        <div class = "small-container">
            <h2 class="Title">Your Favourites</h2>
            <div class="row">
            <?php
               connect();
               $Brand= $_SESSION['user_Brand'];
               $sql = "SELECT * FROM item WHERE Item_Brand ='$Brand' AND Item_gen = 'Female'";
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
<!----loyalty offers--->
            <h2 class="Title"> Loyalty Offers</h2>
            <div class="row">
            <?php
               connect();
                $sql = "SELECT * FROM item WHERE Item_cate = 'Offer' AND Item_gen = 'Female'";
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
