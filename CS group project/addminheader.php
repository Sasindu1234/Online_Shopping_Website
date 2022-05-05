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
        
        <li><a href="addminitem.php">Item details</a></li>
        <li><a href="addminQA.php">Customer Q&A</a></li>
        <li><a href="addmin.php">Order Details</a></li>
      </ul>
    </nav>
    </div>
    <div class="main">
    <nav>

      <ul style="float:right;">
        <?php if(isset($_SESSION['user'])): ?>
        <li><a href="logout.php">Logout</a></li>
        <?php else : ?>
         <li><a href="login.php">Log in</a></li>
        <li><a href="#">Contact us</a></li>
        <?php endif; ?>
    
        
      </ul>
    </nav>
    
    </div>
    </header>
</body>