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
        
        $cat_id = isset($_POST['category'])?$_POST['category']:'';
        $name = isset($_POST['product_name'])?$_POST['product_name']:'';
        $url = isset($_POST['url'])?$_POST['url']:'';
        $mon_price = isset($_POST['mprice'])?$_POST['mprice']:'';
        $annual_price = isset($_POST['aprice'])?$_POST['aprice']:'';
        $sku = isset($_POST['sku'])?$_POST['sku']:'';
        $webspace = isset($_POST['webspace'])?$_POST['webspace']:'';
        $bandwidth = isset($_POST['gband_width'])?$_POST['gband_width']:'';
        $domain = isset($_POST['domain'])?$_POST['domain']:'';
        $launguage = isset($_POST['launguage'])?$_POST['launguage']:'';
        $mail_box = isset($_POST['mail_box'])?$_POST['mail_box']:'';
      
        $features = array('webspace'=>$webspace,
        'bandwidth' => $bandwidth,
        'domain'=> $domain,
        'launguage' => $launguage,
        'mail_box' => $mail_box  
      
        );
        $prod_features = json_encode($features);
        
        $prod->addproduct($cat_id, $name, $url, $prod_features, $mon_price, $annual_price, $sku, $db->conn);
    }
?>
<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">No</strong> notifications.</h6>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                <div class="row shortcuts px-4">
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                      <i class="ni ni-calendar-grid-58"></i>
                    </span>
                    <small>Calendar</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                      <i class="ni ni-email-83"></i>
                    </span>
                    <small>Email</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                      <i class="ni ni-credit-card"></i>
                    </span>
                    <small>Payments</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                      <i class="ni ni-books"></i>
                    </span>
                    <small>Reports</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                      <i class="ni ni-pin-3"></i>
                    </span>
                    <small>Maps</small>
                  </a>
                  <a href="#!" class="col-4 shortcut-item">
                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                      <i class="ni ni-basket"></i>
                    </span>
                    <small>Shop</small>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo$_SESSION['admin'];?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <divlugpan>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

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
    
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-transparent">
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

                    <option value="<?php echo $value['id']; ?>"><?php echo $value['prod_name']; ?></option>
                
        <?php } ?>
        </select>
            </div>

            
            <div class="form-group">
                <label for="pname" class="form-control-label">Enter Product Name</label>
                <input class="form-control" type="text" name="product_name" required placeholder="Enter Product Name  Here" id="pname">
                <span id="e1" class="error"></span>
            </div>
            <div class="form-group">
                <label for="example-text-input" class="form-control-label">Page Url</label>
                <input class="form-control" type="text" name="url"  id="example-text-input">
            </div>
           <hr>
            <h3>Product Description</h3>
            <hr>
            <div class="form-group">
                <label for="mprice" class="form-control-label">Enter Monthly Price</label>
                <input class="test1 form-control" type="number" placeholder="ex:23" name="mprice" required  id="mprice">
                <span id="e2" class="error"></span>
            </div>
            <div class="form-group">
                <label for="aprice" class="form-control-label">Enter Annual Price</label>
                <input class="test1 form-control" type="number"  placeholder="ex:23" name="aprice" required  id="aprice">
                <span id="e3" class="error"></span>
            </div>
            <div class="form-group">
                <label for="sku" class="form-control-label">SKU</label>
                <input class="form-control" type="text" name="sku" required  id="sku">
                <span id="e4" class="error"></span>
            </div>
            <div class="clearfix"></div>
            <hr>
            <h4>Features</h4>
           <hr>
           <div class="form-group">
                <label for="webspace" class="form-control-label">Web Space In GB</label>
                <input class="form-control" type="number" name="webspace" placeholder="enter 0.5 for 512 mb" required  id="webspace">
                <span id="e5" class="error"></span>
            </div>
            <div class="form-group">
                <label for="bandwidth" class="form-control-label">Bandwidth In GB</label>
                <input class="form-control" type="number" name="gband_width" placeholder="enter 0.5 for 512 mb" required  id="bandwidth">
                <span id="e6" class="error"></span>
            </div>
            <div class="form-group">
                <label for="fdomain" class="form-control-label">Free Domain</label>
                <input class="form-control" type="text" name="domain" placeholder="Enter 0 if no domain is avilable" required  id="fdomain">
                <span id="e7" class="error"></span>
            </div>
            <div class="form-group">
                <label for="launguage" class="form-control-label">Launguage/Technically Support</label>
                <input class="form-control" type="text" name="launguage" placeholder="Separate by (,) Ex: PHP, MySQL, MongoDB" required  id="launguage">
                <span id="e8" class="error"></span>
            </div>
            <div class="form-group">
                <label for="mail" class="form-control-label">Mailbox</label>
                <input class="form-control" type="text" name="mail_box" placeholder="Enter Number of mailbox will be provided, enter 0 if none" required  id="mail">
                <span id="e9" class="error"></span>
            </div>


            <input type="submit" name="add" class="btn btn-outline-success" value="Add-Product">
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>

<?php require "footer.php";?>