<?php
/**
 *  Doc Comment for Page
 *
 * PHP version 7
 *
 * @category Product_Class_File
 * @package  CED-HOSTING
 * @author   Cedcoss <sumitshukla@cedcoss.com>
 * @license  Personal use License
 * @link     https://localhost/
 */

 

/**
 *  Doc Comment of class
 *
 * @category Product_Class
 * @package  CED-HOSTING
 * @author   Cedcoss <sumitshukla@cedcoss.com>
 * @license  Personal use License
 * @link     https://localhost/
 */
class Product
{
    /**
     * Function to Show category to the frontend on the add category Page
     */
    public function showCategory($conn)
    {
        $a=array();
        $sql = "SELECT * from `tbl_product` Where `prod_parent_id`=0";
        $result =$conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            array_push($a, $row);
        }
        return $a;
    }
    /**
     * Function to add Sub-Category from addcategory.php page
     */
    public function addSubcategory($cat_id, $name, $link, $date, $conn)
    {

        $sql = "INSERT INTO `tbl_product`(`prod_parent_id`,`prod_name`,`link`,`prod_available`,`prod_launch_date`)
         VALUES ('".$cat_id."','".$name."','".$link."',1,'".$date."')";
        if ($conn->query($sql) === true) {
            echo "<script>alert('Sub Category Added Successfully!!!!')</script>";
        } else {
            echo'<script>alert("'.$conn->error.'")</script>';
        }
    }

    /**
     * Function to Show Sub category to nav Bar and in the Table
     */
    public function showSubcategory($conn)
    {
        $a=array();
        $sql = "SELECT * from `tbl_product` Where `prod_parent_id`=1";
        $result =$conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            array_push($a, $row);
        }
        return $a;

    }
    /**
     * Function to add products on addproduct.php page
     */
    public function addproduct($cat_id, $name, $url, $prod_features, $mon_price, $annual_price, $sku, $conn)
    {

        $sql = "INSERT INTO `tbl_product`(`prod_parent_id`,`prod_name`,`link`,`prod_available`,`prod_launch_date`)
         VALUES ('".$cat_id."','".$name."','".$url."',1,NOW())";
        if ($conn->query($sql) === true) {
            $last_id = $conn->insert_id;
            $sql1 = "INSERT INTO `tbl_product_description`(`prod_id`,`description`,`mon_price`,`annual_price`,`sku`)
         VALUES ('".$last_id."','".$prod_features."','".$mon_price."','".$annual_price."','".$sku."')";
            if ($conn->query($sql1) === true) {
                echo'<script>alert("Product added Successfully!!")</script>';

            }

        } else {
            echo'<script>alert("'.$conn->error.'")</script>';
        }
    }
    /**
     * Function to Show product on Viewproduct.php page
     */
    public function showProduct($conn)
    {
        $a=array();
         $sql = "SELECT * FROM `tbl_product` INNER JOIN `tbl_product_description` ON `tbl_product_description`.`prod_id` = `tbl_product`.`id` WHERE `prod_available`=1";
        $result =$conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            array_push($a, $row);
        }
        return $a;

    } 
    /**
     * Function to Print Category Name in viewproduct table
     */
    public function showCategoryname($id,$conn)
    {
        $a=array();
        $sql = "SELECT `prod_name` from `tbl_product` Where `id`='".$id."'";
        $result =$conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            array_push($a, $row);
        }
        return $a;

    }
}

// SELECT * FROM `tbl_product` INNER JOIN `tbl_product_description` ON `tbl_product_description`.`prod_id` = `tbl_product`.`id`
    
