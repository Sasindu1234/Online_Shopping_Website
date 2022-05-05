
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="page1.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i> Home
            </h3>
        </a>
        <a href="menlg.php" class="navbar-brand">
            <h5 class="px-5">
                <i></i> Men
            </h5>
        </a>
        <a href="womanlg.php" class="navbar-brand">
            <h5 class="px-5">
                <i></i> Women
            </h5>
        </a>

        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav">
                <?php if(isset($_SESSION['user'])): ?>
                <li><a href="logout.php" class="navbar-brand"><h5 class="px-5">
                <i></i> Logout
                    </h5></a></li>
                <?php else : ?>
            
                 <li><a href="login.php" class="navbar-brand"><h5 class="px-5">
                <i></i> Login
                    </h5></a></li>
               <?php endif; ?>
                
                <a href="index.php" class="navbar-brand">
                    <h5 class="px-5">
                    <i></i> Contact us
                     </h5>
                </a>
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>






