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
<?php session_start();
        require_once "class/Dbcon.php";
        require_once "class/Product.php";
        $db = new Dbcon();
        $prod = new Product();

?>
        <?php require 'header.php' ?>



        <table class="table">
                                <thead class="table-danger">
                                <tr>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Monthly Price</th>
                                <th>Annual Price</th>
                                <th>Sku </th>
                                <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody class="tbody-">
        <?php
        if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
        }
        $id = $_REQUEST['id'];
        $details =$prod->showCart($id, $db->conn);
        foreach ($details as $key=> $value) {
            $pro_id = $value['prod_id'];
            $name = $value['prod_name'];
            $mprice = $value['mon_price'];
            $aprice = $value['annual_price'];
            $sku = $value ['sku'];
            $data = array('pro_id'=>$pro_id, 'name'=>$name, 'mprice'=>$mprice, 'aprice'=>$aprice, 'sku'=>$sku);
            array_push($_SESSION['cart'], $data);
        //     unset($_SESSION['cart']);
        //     print_r($_SESSION['cart']);
        }
        foreach ($_SESSION['cart'] as $k=>$v) {
                // print_r($v['pro_id']);
               ?>
                                    
                                 <tr>
                                 <td><?php echo $v['pro_id'];?></td>
                                 <td><?php echo $v['name'];?></td>
                                 <td><?php echo $v['mprice'];?></td>
                                 <td><?php echo $v['aprice'];?></td>
                                 <td><?php echo $v['sku'];?></td>
                                 <td><a href="#" class="bg-warning" onclick="<?php //session_destroy();?>">Delete</a></td>
                                 
            
                                 </tr> 
                               
        <?php } ?>
         </tbody>
         </table>

       
         <?php require 'footer.php'; ?> 
    
     
    </body>
</html>
