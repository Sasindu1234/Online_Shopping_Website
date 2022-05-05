<?php

session_start();

require_once ('component.php');
include 'database/dbget.php';
//require_once ("fillcart.php");


if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              $_SESSION['total'] = $_SESSION['total']-$value["product_qty"]*$value["product_price"];
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}

if (isset($_POST['order'])){
    if(isset($_SESSION['cart'])){
        if (isset($_SESSION['user_id'])){
            foreach ($_SESSION['cart'] as $key => $value){

            $customerid = $_SESSION['user_id'];
            $Itemcode = $value["product_id"];
            $deladdress = $_SESSION['user_address'];
            $Itemqty  = $value["product_qty"];
            $Itemsize = $value["product_size"];
            
            
            connect();
            //$sql = "INSERT INTO deliver (cus_id,Item_code,del_que,del_size,del_YN,del_adr) 
                // VALUES ('$customerid','$Itemcode','$Itemqty',$Itemsize,'No','$deladdress')";
            $sql = "INSERT INTO `deliver`(`cus_id`, `Item_code`, `del_que`, `del_size`, `del_YN`, `del_adr`) VALUES ('$customerid','$Itemcode','$Itemqty','s','No','$deladdress')";
            $result = mysqli_query($conn, $sql);
            }
              echo "<script>alert('You order is sent! ')</script>";
              echo "<script>window.location = 'page1.php'</script>";
              unset($_SESSION['cart']);
                        
                    }
        else{
             echo "<script>alert('please log in first')</script>";
            echo "<script>window.location = 'login.php'</script>";
                        }

    }
    else{
        echo "<script>alert('Please select item')</script>";
            echo "<script>window.location = 'cart.php'</script>";
    }
       

}




?>

<!doctype html>
<html lang="en">
<head>
  
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="Css/style1.css">
</head>
<body class="bg-light">
    
<?php

    require_once ('header.php');
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php

                
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                         $conn = new mysqli("localhost", "root", "","onlinecloth") or die("fail");
                       $sql = "SELECT * FROM item";
                       $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['Item_code'] == $id){
                                    cartElement1($row['Item_pic'], $row['Item_des'],$row['Item_price'], $row['Item_code']);
                                   
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }

                ?>
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>Rs:<?php 
                          if (isset($_SESSION['cart'])){
                               $total2 = $_SESSION['total'];
                               echo $total2;
                            }else{
                                 echo "0";
                            }
                         ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>Rs:<?php 
                          if (isset($_SESSION['cart'])){
                               $total2 = $_SESSION['total'];
                               echo $total2;
                            }else{
                                 echo "0";
                            }
                         ?></h6>
                        <div class="shopping-cart">
                        <form action="cart.php" method="POST">
                        <button type="submit" name = "order" class="btn btn-warning">Place Order</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>

</div>
  



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
