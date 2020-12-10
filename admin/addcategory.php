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
                                    Create Category
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
        <form action="" method="POST">
            <h1 class="text-orange text-dark">Create Category</h1>
        <?php $details =$prod->showCategory($db->conn);
        foreach ($details as $key=> $value) {?>
        <div class="form-group">
                <label for="exampleFormControlSelect1">Choose Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category">
                    <option value="<?php echo $value['id'] ?>"><?php echo $value['prod_name'] ?></option>
                </select>
            </div>

        <?php } ?>
            
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Add Sub-Category</label>
                <input class="form-control" type="text" name="sub_category" required placeholder="Enter Sub-Category Here" id="example-text-input">
            </div>
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Link Address</label>
                <input class="form-control" type="text" name="link" required placeholder="Enter Link-Address Here" id="example-text-input">
            </div>
            <input type="submit" name="add" class="btn btn-outline-danger" value="Add-Sub-category">
        </form>
    </div>
    <div class="table-responsive">
    <div>
        <div class="container">
        <table id='example' class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"> Id</th>
                    <th scope="col" class="sort">Category</th>
                    
                    <th scope="col">Sub-Category</th>
                    <th scope="col">Visible/Hidden</th>
                    <th scope="col">Launch Date</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody class="tbody-dark" >
            <?php $details =$prod->showSubcategory($db->conn);
            foreach ($details as $key=> $value) {?>
            <form action=""></form>
                <tr>
                <td><?php echo $value['id']; ?></td>
                    <td></td>
                    <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) { ?>
                    <td> <input type="text" name="name" value="<?php echo $value['prod_name'] ?>"></td>
                    <?php } else { ?>
                    <td><?php echo $value['prod_name']?></td>
                    <?php }?>
                    <!-- <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) { ?>
                    <?php } ?> -->
                    <td>
                        <?php
                            $status = $value['prod_available'];
                        if ($status == 1) {
                            echo "Visible";
                        } else {
                            echo "Hidden";
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $value['prod_launch_date'];?>
                    </td>
                        <td>
                        <input type="hidden" name="id" value="<?php echo $value['id']; ?> ">
                            <input type="submit" class="btn-danger" name="edit" value="Edit">
                        </td>
                        <td>
                            <button class="btn-success"><a href="#!" class="btn-success">Delete</a></button>
                        </td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>
    </div>
    
    </div>
  
<?php require "footer.php";?>