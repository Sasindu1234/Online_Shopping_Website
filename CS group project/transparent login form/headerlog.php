<?php 

session_start();



?>

<html>
<head>
    <title>Online cloth</title>
   
        
         <link rel="stylesheet" href="header.css">
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
    </header>
</body>