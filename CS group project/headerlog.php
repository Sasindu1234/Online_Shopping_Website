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
        <?php if(isset($_SESSION['user'])): ?>
        <li><a href="page1.php">Home</a></li>
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
           <li><a href="signin.php">Sign Up</a></li>
         <li><a href="login.php">Log in</a></li>
        <li><a href="contacts">Contact us</a></li>
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
    </header>
</body>