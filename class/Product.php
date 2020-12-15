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

        $sql = "INSERT INTO `tbl_product`(`prod_parent_id`,`prod_name`,`html`,`prod_available`,`prod_launch_date`)
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
        $sql = "SELECT * from `tbl_product` Where `prod_parent_id`=1 AND `prod_available`=1";
        $result =$conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            array_push($a, $row);
        }
        return $a;

    }
    /**
     * Function to Show Sub category to nav Bar and in the Table
     */
    public function showAllcategory($conn)
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

        $sql = "INSERT INTO `tbl_product`(`prod_parent_id`,`prod_name`,`html`,`prod_available`,`prod_launch_date`)
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
         $sql = "SELECT * FROM `tbl_product_description`  INNER JOIN `tbl_product` ON `tbl_product_description`.`prod_id` = `tbl_product`.`id` WHERE `prod_available`=1";
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
    /**
     * Function to Hide the category on the category page
     */
    public function hide($id, $conn)
    {
        $sql = "UPDATE  `tbl_product` SET `prod_available`=0 where `id`='".$id."'";

        if ($conn->query($sql) === true) {
            echo"<script>alert('Sub-Category Hidden Successfully');
            window.location.href='addcategory.php'</script>";
        } else {
            echo $conn->error;
        }
    }
    /**
     * Function to Show the category on view product page
     */
    public function show($id, $conn)
    {
        $sql = "UPDATE  `tbl_product` SET `prod_available`=1 where `id`='".$id."'";

        if ($conn->query($sql) === true) {
            echo"<script>alert('Sub-Category Visible Successfully');
            window.location.href='addcategory.php'</script>";
        } else {
            echo $conn->error;
        }
    }
    /**
     * Function to Update the Products
     */

    public function updateProduct($id, $name,  $prod_features, $mon_price, $annual_price, $sku, $conn)
    {
        $sql = "UPDATE  `tbl_product` SET `prod_name`='".$name."'  where `id`='".$id."'";
        if ($conn->query($sql) === true) {

            $sql1 = "UPDATE  `tbl_product_description` SET `description`='".$prod_features."', `mon_price`='".$mon_price."' , `annual_price`='".$annual_price."' , `sku`='".$sku."' where `prod_id`='".$id."'";
            if ($conn->query($sql1) === true) {
                echo"<script>alert('Product Updated Successfully');
            window.location.href='viewproduct.php'</script>";
            } else {
                echo $conn->error;
            }
        } else {
            echo $conn->error;
        }
    }
    /**
     *     *Function to update the category 
     */
    public function updateCategory($id, $name, $link, $conn)
    {
        $sql1 = "UPDATE  `tbl_product` SET `prod_name`='".$name."', `html`='".$link."' WHERE `id`='".$id."'";
        if ($conn->query($sql1) === true) {
            echo"<script>alert('Category Updated Successfully');
        window.location.href='addcategory.php'</script>";
        } else {
            echo $conn->error;
        }
        
    }
    /**
     * Function to delete the category on the create category page
     */
    public function delcat($id, $conn)
    {
        $sql = "DELETE FROM `tbl_product` WHERE `id`='".$id."'";
        if ($conn->query($sql) === true) {
            echo"<script>alert('Category Deleted Successfully');
        window.location.href='addcategory.php'</script>";
        } else {
            echo $conn->error;
        }
    }
     /**
     * Function to delete the category on the create category page
     */
    public function delProduct($id, $conn)
    {
        $sql = "DELETE FROM `tbl_product` WHERE `id`='".$id."'";
        if ($conn->query($sql) === true) {
            echo"<script>alert('Product Deleted Successfully');
        window.location.href='viewproduct.php'</script>";
        } else {
            echo $conn->error;
        }
    }
     /**
     * Function to Show product on Cat  page
     */
    public function singleproduct($id, $conn)
    {
        $a=array();
         $sql = "SELECT * FROM  `tbl_product_description`  INNER JOIN `tbl_product` ON `tbl_product_description`.`prod_id` = `tbl_product`.`id` WHERE `prod_parent_id`='".$id."'";
        $result =$conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            array_push($a, $row);
        }
        return $a;

    }
       
}    
