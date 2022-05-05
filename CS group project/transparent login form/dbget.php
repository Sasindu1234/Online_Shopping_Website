<?php

  
   function connect(){
        global $conn;
       
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "online_shopping";

        $conn = new mysqli($servername, $username, $password,$dbname) or die("Database connection fail Try again");

        return $conn;

        
    }
    // get product from the database
    function getData(){
        global $result;
     	$conn = new mysqli("localhost", "root", "","online_shopping") or die("fail");
        $sql = "SELECT * FROM item";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }


?>