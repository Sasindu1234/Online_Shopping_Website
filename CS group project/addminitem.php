<?php

    $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "onlinecloth";

    
    $con = new mysqli($servername, $username, $password,$dbname) or die("Database connection fail Try again");
  if (isset($_GET["action"])){
            if ($_GET['action'] == 'delete'){
                        $Item_id  = $_GET["id"];
                        print_r($_GET["id"]);
                        print_r( $Item_id );

                     //$sql = "DELETE FROM `item` WHERE `Item_code`  = '$product_id '";
                    //$result = mysqli_query($con, $sql );
                    
                    //echo "<script>window.location = 'cart.php'</script>";
                    
                        }
            }

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <style>
        @import url('https://fonts.googleapis.com/css?family=Titillium+Web');

        *{
            font-family: 'Titillium Web', sans-serif;
        }
        .product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
</head>

<body style="background: url('images/addmin.jpg') fixed;">
    <?php require_once ('addminheader.php');
    ?>

    <div class="container" style="width: 65%">
       

        <div style="clear: both"></div>
        <h3 class="title2">Item details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="10%">Product Code</th>
                <th width="10%">Product Name</th>
                <th width="30%">Product Image</th>
                
                <th width="10%">No of Item</th>
                <th width="10%">Price</th>
                <th width="17%">Update Item</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                $sql = "SELECT * FROM item" ;
               $result = mysqli_query($con, $sql );
               $num_row   = mysqli_num_rows($result) ;

                  if($num_row   > 0){

                while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["Item_code"]; ?></td>
                            <td><?php echo $row["Item_des"]; ?></td>
                            <td><img src="<?php echo $row["Item_pic"]; ?>" class="img-responsive"></td>
                            <td><?php echo $row["No_of_item"]; ?></td>
                            <td>$<?php echo $row["Item_price"]; ?></td>
                            
                            <td><a href="addminitem.php?action=update&id=<?php echo $row["Item_code"]; ?>"><span
                                        class="text-danger">Update Item</span></a></td>
                            <td><a href="addminitem.php?action=delete&id=<?php echo $row["Item_code"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                  <?php
                }
            }
        ?> 
            </table>
        </div>

    </div>


</body>
</html>
