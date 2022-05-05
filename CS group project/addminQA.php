<?php
  
    $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "onlinecloth";

    
    $con = new mysqli($servername, $username, $password,$dbname) or die("Database connection fail Try again");
  if (isset($_POST["submit"])){
                        $quscode = $_POST["que_id"];
                        $Answers  = $_POST["answers"];
                        $sql = "UPDATE `qustion` SET `answ` = '$Answers' WHERE `que_code` = '$quscode'";   
                        $result = mysqli_query($con, $sql );   
                        //echo "<script>window.location = 'cart.php'</script>";
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
        <h3 class="title2">Qustion and answers</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="10%">Qustion Code</th>
                <th width="10%">Customer Code</th>
                <th width="20%">Feedback</th>
                <th width="30%">Qustion</th>
                <th width="30%">Answers</th>
                <th>Update</th>

                
                
            </tr>

            <?php
                $sql = "SELECT * FROM qustion" ;
               $result = mysqli_query($con, $sql );
               $num_row   = mysqli_num_rows($result) ;

                  if($num_row   > 0){

                while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["que_code"]; ?></td>
                            <td><?php echo $row["cus_id"]; ?></td>
                            <td><?php echo $row["feedback"]; ?></td>
                            <td><?php echo $row["que"]; ?></td>
                            <?php if(!empty($row["answ"])): ?>
                                <td><?php echo $row["answ"]; ?></td>
                                <?php else: ?>
                                <form method="post" action="addminQA.php"><td><textarea name="answers" rows="4" cols="30"></textarea></td>
                                 <td><input type="submit" name="submit" value="Update answer"/></td>
                                 <input type = 'hidden' name = "que_id" value = '<?php echo $row["que_code"]; ?>'>
                                
                                </form>
                                <?php endif; ?>

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
