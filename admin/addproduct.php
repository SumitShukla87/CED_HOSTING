<?php
/**
 *  File Doc Comment
 *
 * PHP version 7
 *
 * @category Create_Category_Page
 * @package  Ced-Hosting
 * @author   Sumit Shukla <shuklasumit316@gmail.com>
 * @license  Personal use License
 * @link     https://localhost/
 */

session_start();
if ($_SESSION['admin']== "") {
    header("location:../login.php");
} 
require "sidebar.php";
require "../class/Dbcon.php";
require "../class/Product.php";
$db = new Dbcon();
$prod = new Product();?>

<div class="main-content" id="panel">
    <?php
    if (isset($_POST['add'])) {
        
        $cat_id = strtolower(isset($_POST['category'])?$_POST['category']:'');
        $name = isset($_POST['sub_category'])?$_POST['sub_category']:'';

        $date = date("Y-m-d h:i:s");
        $link = isset($_POST['link'])?$_POST['link']:'';
        $prod->addSubcategory($cat_id, $name, $link, $date, $db->conn);
    
    }
?>

    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">
                            Default
                        </h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="fas fa-home">
                                        </i></a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="dashboard.php">Dashboards</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Add New Product
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="#" class="btn btn-sm btn-neutral">New</a>
                        <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                    </div>
                </div>
                <!-- -->
            </div>
        </div>
    </div>
    
    <div class="container pt-5 mt-5 pl-5 pr-5 mb-5 pb-5">
    <div class="card p-3">
        <form action="" method="POST">
        <div class="mt-5 mb-5">

            <h1>Create New Product</h1>
            <h4>Enter Product Details</h4>
        </div>    
        <hr>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Product Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category">
        <?php $details =$prod->showSubcategory($db->conn);

        foreach ($details as $key=> $value) {?>

                    <option value="<?php echo $value['id'] ?>"><?php echo $value['prod_name'] ?></option>
                
        <?php } ?>
        </select>
            </div>

            
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Enter Product Name</label>
                <input class="form-control" type="text" name="product_name" required placeholder="Enter Product Name  Here" id="example-text-input">
            </div>
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Page Url</label>
                <input class="form-control" type="text" name="url" required  id="example-text-input">
            </div>
           <hr>
            <h3>Product Description</h3>
            <hr>
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Enter Monthly Price</label>
                <input class="form-control" type="number" placeholder="ex:23" name="mprice" required  id="example-text-input">
            </div>
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Enter Annual Price</label>
                <input class="form-control" type="number" placeholder="ex:23" name="aprice" required  id="example-text-input">
            </div>
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">SKU</label>
                <input class="form-control" type="text" name="sku" required  id="example-text-input">
            </div>
            <div class="clearfix"></div>
            <hr>
            <h4>Features</h4>
           <hr>
           <div class="form-group">
                <label for="example-text-input" class="form-control-label">Web Space In GB</label>
                <input class="form-control" type="text" name="gspace" placeholder="enter 0.5 for 512 mb" required  id="example-text-input">
            </div>
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Bandwidth In GB</label>
                <input class="form-control" type="text" name="gband_width" placeholder="enter 0.5 for 512 mb" required  id="example-text-input">
            </div>
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Free Domain</label>
                <input class="form-control" type="text" name="gband_width" placeholder="Enter 0 if no domain is avilable" required  id="example-text-input">
            </div>
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Launguage/Technically Support</label>
                <input class="form-control" type="text" name="launguage" placeholder="Separate by (,) Ex: PHP, MySQL, MongoDB" required  id="example-text-input">
            </div>
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Mailbox</label>
                <input class="form-control" type="text" name="mail_box" placeholder="Enter Number of mailbox will be provided, enter 0 if none" required  id="example-text-input">
            </div>


            <input type="submit" name="add" class="btn btn-outline-success" value="Add-Product">
        </form>
    </div>
    </div>
  
<?php require "footer.php";?>