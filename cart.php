<?php

/**
 * Template File Doc Comment
 * 
 * PHP version 7
 * 
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/license/MIT MIT License
 * @link     https://localhost/ 
 */
?>
<?php session_start(); ?>
        <?php require 'header.php' ?>
        <?php
       
        // echo '<div id="main">';
        // echo '<div id="products">';
        // echo'<form method="GET" action="">';
        // foreach ($product_list as $key=>$value) {
        
        //     echo '<div id="product-101" class="product">';
        //     echo '<img src='.$value['img'].'>';
        //     echo '<h3 class="title"><a href="#">'.$value['title'].'</a></h3>';
        //     echo'<span>Price:'.$value['price'].'</span>';
        //     echo"<a class='add-to-cart' href='products.php?$key'>Add To Cart</a>";
        //     echo'</div>';

        //     if (isset($_GET["$key"])) {

        //         $title = $value['title']; 
        //         $price = $value['price'];
        //         $img = $value['img'];
        //         $quant = 1;
        //         foreach ($_SESSION as  $key1=>$value1) {
                
        //             if ($key1 == $key) {
        //                 $quant =$value1[3] + 1;
                        

        //             }


        //         }
        //         $prod = array($title,$price ,$img, $quant);
        //         $_SESSION[$title]= $prod;               
               

        //     }
                
        // }  
     

        
        // echo'</form>';
        // echo'</div>';
        // echo'</div>'; 
        
        ?> 
        <?php 
        
        // $bill=0;
        // $total = 0;?>
<?php if (isset($_SESSION['cart'])) {
?>

                                <table class="table">
                                <thead class="table-danger">
                                <tr>
                                <th>Product Id</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>Monthly Price</th>
                                <th>Annual Price</th>
                                <th>Delete </th>
                                </tr>
                                </thead>
                                <tbody class="tbody-">
                                <tr>
                                <td>Hello</td>
                                <td>Hello</td>
                                <td>Hello</td>
                                <td>Hello</td>
                                <td>Hello</td>
                                <td>Hello</td>
            
            </tr>
<?php   } else {?>
<h2 class="text-danger p-5">Sorry No Item in cart..</h2>

<?php }?>
<?php
        // foreach ($_SESSION as $pro) {
        //         $p = 0;
        //         $q = 0;
            
        //     echo'<tr>';
        //     echo'<form action="editproduct.php" method="POST">';
        //     foreach ($pro as $key=>$value) {
          
                
                

        //         if ($key==3) {
        //             echo"<td><input type='text' name='name$key' value='$value'></td>";
               
        //             $q = $value;
                 

        //         } elseif ($key==2) {
                    
                    
        //             echo"<input type='hidden' name='name$key' value='$value'>";
        //             echo'<td> <img src = '.$value.'></td>';
                   

        //         } elseif ($key==1) {
        //             echo"<input type='hidden' name='name$key' value='$value'>";
        //             echo'<td>'.$value.'</td>';
        //             $p = $value;
              
                
                    
                   
                  


        //         } elseif ($key==0) {
        //             echo"<input type='hidden' name='name$key' value='$value'>";
                 
        //             echo'<td>'.$value.'</td>';


        //         }
                
            
                
        //     }

          
           
        //     $bill = ($q * $p);
        //     echo'<td>'.($bill) .'</td>';
           
           
           
        //     echo"<td><input type='submit' name='event' value='Update'  class='b1'></td>";
        //     echo"<td><input type='submit' name='event' value='Delete'  class='b1'></td>";
        //     echo'</form>';
           

        //     echo'</tr>';
        //     $total = ($total+$bill);
           
           
     
           
        // }
        
        // echo"<tr>";
        // echo"<td colspan='7'>Total price: ".($total)."</td>";
        // echo"</tr>";
      
      
       
     
      
        ?>
          </tbody>
         </table>
         <?php require 'footer.php'; ?> 
    
     
    </body>
</html>
