<?php
   


require_once ('component.php');

include 'database/dbget.php';




    

   


        if (isset($_POST['deliver'])){
            if ($_GET['action'] == 'deliver'){
                                $deliver_id  = $_GET["id"];
                    //echo "<script>alert('Product has been Removed...!')</script>";
                     $sql = "UPDATE `deliver` SET `del_YN` = 'Yes' WHERE `del_id` = '$deliver_id '";
                    $result = mysqli_query($con, $sql );
                    print_r($_GET["id"]);
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
    <title>Deliver Details</title>

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
        <h2>Deliver Details</h2>
        <?php
             connect();
             $sql = "SELECT * FROM deliver" ;
            $result = mysqli_query($conn, $sql );
                  $num_row   = mysqli_num_rows($result) ;

             if($num_row   > 0){

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="addmin.php?action=deliver&id=<?php echo $row["del_id"]; ?>">

                            <div class="product">
                                <img src="<?php echo $row["Item_pic"]; ?>" class="img-responsive">
                                <h5 class="text-info"> Order Id:  <?php echo $row["del_id"]; ?></h5>
                                <h5 class="text-info"> Item Code:<?php echo $row["Item_code"]; ?></h5>
                                <h5 class="text-info"> Customer Id:<?php echo $row["cus_id"]; ?></h5>
                                 <h5 class="text-info"> Delivered?:<?php echo $row["del_YN"]; ?></h5>
                                 
                                <input type="hidden" name="hidden_name" value="<?php echo $row["cus_id"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["Item_code"]; ?>">
                                <?php if($row["del_YN"]=="No"): ?>
                                <input type="submit" name="deliver" style="margin-top: 5px;" class="btn btn-success"
                                       value="Sent order">
                                <?php else: ?>
                                <h5 class="text-danger"> This order deliverd</h5>
                                <?php endif; ?>

                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>

       

    </div>


</body>
</html>
