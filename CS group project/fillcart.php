<?php 

session_start();
require_once ('component.php');
include 'database/dbget.php';
 $total1 =0;
if (isset($_POST['add'])){
     
    
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            
            foreach ($_SESSION['cart'] as $key => $value){
                        $total1 =  $total1 +  $value["product_qty"]*$value["product_price"];
                    }
              $_SESSION['total'] = $total1;
             

          echo "<script>alert('Product is already added in the cart..!')</script>";
           echo "<script>window.location = 'cart.php'</script>";
            
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id'] , 'product_qty' => $_POST['quantity'], 'product_price' => $_POST['product_price'], 'product_size' => $_POST['size']
            );

            $_SESSION['cart'][$count] = $item_array;
            
            foreach ($_SESSION['cart'] as $key => $value){
                        $total1 =  $total1 +  $value["product_qty"]*$value["product_price"];
                    }
            $_SESSION['total'] = $total1;
            
            

            echo "<script>window.location = 'cart.php'</script>";
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id'] , 'product_qty' => $_POST['quantity'] , 'product_price' => $_POST['product_price'], 'product_size' => $_POST['size']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        $_SESSION['total'] = $total1;
       echo "<script>window.location = 'cart.php'</script>";
        
    }
}

    
   

?>