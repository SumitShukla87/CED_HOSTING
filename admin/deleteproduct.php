<?php
/**
 *  File Doc Comment
 *
 * PHP version 7
 *
 * @category Delete_Category
 * @package  Cab-rides
 * @author   Sumit <sumitshukla@cedcoss.com>
 * @license  Personal use License
 * @link     https://localhost/
 */

session_start();
if ($_SESSION['admin']== "") {
    header("location:../login.php");
}

require "../class/Dbcon.php";
require "../class/Product.php";

        $id = $_REQUEST['id'];
        echo $id;
        $db = new Dbcon();
        $prod= new Product();
        $prod->delProduct($id, $db->conn);    
    
?>