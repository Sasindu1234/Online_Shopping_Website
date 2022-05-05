<?php

function component($productname = " ", $productprice=" ", $productimg = " ",$productrating = " ", $productid = " "){



	
     echo   			"<img src='$productimg'>";
       echo 			"<h4>$productname</h4>";
        echo			'<div class="rating">';
             if($productrating==5){
        	echo			'<i class="fa fa-star" ></i>';
        	echo			'<i class="fa fa-star" ></i>';
        	echo			'<i class="fa fa-star" ></i>';
        	echo			'<i class="fa fa-star" ></i>';
        	echo			'<i class="fa fa-star" ></i>';
        	     }
              elseif($productrating==4){
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star-o"></i>';

              }

              elseif($productrating == 3)
            {
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star-o"></i>';
          echo      '<i class="fa fa-star-o"></i>';    
            }

            
              
        echo		'</div>';
       echo		"<p>$$productprice</p>";
       echo   "<small class=\"text-secondary\">Quantity</small>";
        echo      "<input class=\"quantity\" min=\"0\" name=\"quantity\" value=\"1\" type=\"number\" style = \"width: 50%; padding: 10px 10px;\">";
        echo '<br>';
         echo      '<select name="size">';
         echo                '<option selected>XL</option>';
         echo                '<option selected>L</option>';
         echo                '<option selected>M</option>';
         echo                '<option selected>S</option>';
         echo                '<option selected>XS</option>';
         echo        '</select>';
       echo     '<button type="submit" class="btn" name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>';
       echo "<input type = 'hidden' name = 'product_id' value = '$productid'>";
       echo "<input type = 'hidden' name = 'product_price' value = '$productprice'>";
       
}

function cartElement($productname = " ", $productprice=" ", $productimg = " ",$productrating = " ", $productid = " ")
{             
              echo '<div class="col-4">';
              echo '<form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">';
             
              echo '<div>';
                echo "<img src='$productimg'>";
                echo '<div class="prod">';
                    echo "<h3 class='tit' id='brand1'>$productname</h3>" ;
                    
                     echo   "<p>$$productprice</p>";
                    
                    
                echo '</div>';
                echo      '<div class="prod">';
             if($productrating==5){
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
               }
              elseif($productrating==4){
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star-o"></i>';

              }

              elseif($productrating == 3)
            {
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star" ></i>';
          echo      '<i class="fa fa-star-o"></i>';
          echo      '<i class="fa fa-star-o"></i>';    
            }
                  echo    '</div>';

                echo '<div class="inputs">';
                    echo '<input type="number" id="quantity1" name="quantity1" min="1" max="99" value="1">';
                    echo '<select id="size1" name="size1" onclick="deleteE(message1)">';
                        echo '<option value="size" disabled selected>Size</option>';
                        echo '<option value="XS">XS</option>';
                        echo '<option value="S">S</option>';
                        echo '<option value="M">M</option>';
                        echo '<option value="L">L</option>';
                        echo '<option value="XL">XL</option>';
                    echo '</select>';
                    
                echo '<div>';
                        echo '<button class="addTo" onclick="add(1)">Add</button>';
                        echo '<button class="remTo"  name="remove">Remove</button>';
                    echo '</div>';
                echo '</div>';
                echo '<p id="message1"></p>';
            echo '</div>';
            echo '</form>';
             echo '</div>';
          }
            
function cartElement1($productimg, $productname, $productprice, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src='$productimg'>
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$productname</h5>
                                
                                <h5 class=\"pt-2\">$$productprice</h5>
                               
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <form action=\"cart.php\" method=\"post\" class=\"cart-items\">
                                    <small class=\"text-secondary\">Quantity</small>
                                    <h5 class=\"pt-2\"></h5>
                                     
                                     
                                     </form>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
  }

  

 
?>