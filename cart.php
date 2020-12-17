<?php

/**
 * Template File Doc Comment
 *
 * PHP version 7
 *
 * @category CED_HOSTING
 * @package  CART_PAGE
 * @author   Sumit <sumitshukla@cedcoss.com>
 * @license  Personal License
 * @link     https://localhost/
 */
?>
<?php session_start();
        require_once "class/Dbcon.php";
        require_once "class/Product.php";
        $db = new Dbcon();
        $prod = new Product();
        require 'header.php';
if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
} ?>
        <?php
       
        if (isset($_GET['id'])) {
            $id = base64_decode($_GET['id']);
            $details =$prod->showCart($id, $db->conn);
            foreach ($details as $key=> $value) {
                $pro_id = $value['prod_id'];
                $name = $value['prod_name'];
                $mprice = $value['mon_price'];
                $aprice = $value['annual_price'];
                $sku = $value ['sku'];
                $data = array('pro_id'=>$pro_id, 'name'=>$name, 'mprice'=>$mprice, 'aprice'=>$aprice, 'sku'=>$sku);
                array_push($_SESSION['cart'], $data);
              
                $_SESSION['cart'] = array_map("unserialize", array_unique(array_map("serialize", $_SESSION['cart'])));
            }
        }?>

<?php if (!isset($_SESSION['cart'])) {?>
        <h2 class="text-danger text-center">You have No items in the Cart!!!!</h2>
       
<?php } else {?>
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

<?php foreach ($_SESSION['cart'] as $k=>$v) {
        ?>
        <tr>
        <td><?php echo $v['pro_id']; ?></td>
        <td><?php echo $v['name']; ?></td>
        <td>$<?php echo $v['mprice']; ?></td>
        <td>$<?php echo $v['aprice']; ?></td>
        <td><?php echo $v['sku']; ?></td>
        <td><a href="deletecart.php?id=<?php  echo $v['pro_id'];?>" class="btn btn-danger" >Delete</a></td>
        </tr>
        <?php 
} ?>    </tbody>
         </table>

<?php } ?>
        <?php require 'footer.php'; ?>


    </body>
</html>
