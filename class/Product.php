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
}
