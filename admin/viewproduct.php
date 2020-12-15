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
if (isset($_POST['update'])) {
    $id = isset($_POST['id'])?$_POST['id']:'';
    $name = isset($_POST['name'])?$_POST['name']:'';
    $mon_price = isset($_POST['mprice'])?$_POST['mprice']:'';
    $annual_price = isset($_POST['aprice'])?$_POST['aprice']:'';
    $sku = isset($_POST['sku'])?$_POST['sku']:'';
    $webspace = isset($_POST['webspace'])?$_POST['webspace']:'';
    $bandwidth = isset($_POST['bandwidth'])?$_POST['bandwidth']:'';
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
        
    $prod->updateProduct($id, $name, $prod_features, $mon_price, $annual_price, $sku, $db->conn);
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
                                <span class="input-group-text"><i class="fas fa-search">
                                    </i></span>
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
                                <i class="sidenav-toggler-line">
                                </i>
                                <i class="sidenav-toggler-line">
                                </i>
                                <i class="sidenav-toggler-line">
                                </i>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-sm-none">
                        <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in">
                            </i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-bell-55">
                            </i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                            <!-- Dropdown header -->
                            <div class="px-3 py-3">
                                <h6 class="text-sm text-muted m-0">
                                    You have 
                                    <strong class="text-primary">New</strong>
                                    notifications.
                                </h6>
                            </div>
                            
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-ungroup">
                            </i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                            <div class="row shortcuts px-4">
                                <a href="#!" class="col-4 shortcut-item">
                                    <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                        <i class="ni ni-calendar-grid-58">
                                        </i>
                                    </span>
                                    <small>Calendar</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                                    <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                        <i class="ni ni-email-83">
                                        </i>
                                    </span>
                                    <small>Email</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                                    <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                                        <i class="ni ni-credit-card">
                                        </i>
                                    </span>
                                    <small>Payments</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                                    <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                                        <i class="ni ni-books">
                                        </i>
                                    </span>
                                    <small>Reports</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                                    <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                        <i class="ni ni-pin-3">
                                        </i>
                                    </span>
                                    <small>Maps</small>
                                </a>
                                <a href="#!" class="col-4 shortcut-item">
                                    <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                                        <i class="ni ni-basket">
                                        </i>
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
                                <h6 class="text-overflow m-0">
                                    Welcome!
                                </h6>
                            </div>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-single-02">
                                </i>
                                <span>My profile</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-settings-gear-65">
                                </i>
                                <span>Settings</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-calendar-grid-58">
                                </i>
                                <span>Activity</span>
                            </a>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-support-16">
                                </i>
                                <span>Support</span>
                            </a>
                            <div class="dropdown-divider">
                            </div>
                            <a href="logout.php" class="dropdown-item">
                                <i class="ni ni-user-run">
                                </i>
                                <span>Logout</span>
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
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="table-responsive">
                            <div>
                                <div class="container">
                                    <hr>
                                    <h1>
                                        Details Of Product
                                    </h1>
                                    <hr>
                                    <table id='example' class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                              
                                                <th scope="col" class="sort">
                                                    Category
                                                </th>
                                                <th scope="col">
                                                    Product Name
                                                </th>
                                                <th scope="col">
                                                    Visible/Hidden
                                                </th>
                                                <th scope="col">
                                                    Launch Date
                                                </th>
                                                <th>
                                                Webspace(in gb:)
                                                </th>
                                                <th>
                                                Banwidth(in gb:)
                                                </th>
                                                <th>
                                                
                                                Free Domain</th>
                                                <th>Launguage</th>
                                                <th>Mail-Box</th>
                                                <th>Monthly-Price</th>
                                                <th>Annual-Price</th>
                                                <th>SKU</th>
                                                <th scope="col">
                                                    Edit
                                                </th>
                                                <th scope="col">
                                                    Delete
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody-dark" >
                                            <?php $details =$prod->showProduct($db->conn);
                                            foreach ($details as $key=> $value) {?>
                                        
                                            <tr>
                                            <form action="" method="POST">
                                                
                                              
                                                   <td> <?php $id = $value['prod_parent_id'];
                                                    $details1 =$prod->showCategoryname($id, $db->conn);
                                                    foreach ($details1 as $k1 =>$v1) {
                                                        echo $v1['prod_name'];
                                                    }
                                                    
                                                    ?>
                                                </td>
                                                <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) {?>
                                                <td>
                                                    <input type="text" name="name" value="<?php echo $value['prod_name'];?>">
                                                </td>
                                                <?php } else { ?>
                                                <td>
                                                    <?php echo $value['prod_name']?></td>
                                                <?php }?>
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
                                                    <?php $desc = $value['description'];
                                                    $desc_decode = json_decode($desc);
                                                    $webspace=$desc_decode->webspace;
                                                    $bandwidth = $desc_decode->bandwidth;
                                                    $domain = $desc_decode->domain;
                                                    $launguage = $desc_decode->launguage;
                                                    $mail_box = $desc_decode->mail_box;
                                                    // foreach ($desc_decode as $k=> $v) {?>
                                                    <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) {?>
                                                <td>
                                                    <input type="text" name="webspace" value="<?php echo $webspace; ?>">
                                                </td>
                                                    <?php } else { ?>
                                                <td>
                                                <?php echo $webspace; ?>
                                                </td>
                                                    <?php }?>


                                                    <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) {?>
                                                <td>
                                                    <input type="text" name="bandwidth" value="<?php echo $bandwidth;?>">
                                                </td>
                                                    <?php } else { ?>
                                                <td>
                                                <?php echo $bandwidth;?>
                                                </td>
                                                    <?php }?>

                                                        <!--  -->
                                                        <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) {?>
                                                <td>
                                                    <input type="text" name="domain" value="<?php echo $domain;?>">
                                                </td>
                                                        <?php } else { ?>
                                                <td>
                                                <?php echo $domain;?></td>
                                                        <?php }?>
                                                    <!--  -->
                                                    <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) {?>
                                                <td>
                                                    <input type="text" name="launguage" value="<?php echo $launguage;?>">
                                                </td>
                                                    <?php } else { ?>
                                                <td>
                                                <?php echo $launguage;?>
                                                </td>
                                                    <?php }?>
                                                    <!--  -->
                                                    <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) {?>
                                                <td>
                                                    <input type="text" name="mail_box" value="<?php echo $mail_box;?>">
                                                </td>
                                                    <?php } else { ?>
                                                <td>
                                                <?php echo $mail_box;?>
                                                </td>
                                                    <?php }?>  
                                                    <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) {?>
                                                <td>
                                                    <input type="text" name="mprice" value="<?php echo $value['mon_price'];?>">
                                                </td>
                                                    <?php } else { ?>
                                                <td>
                                                <?php echo $value['mon_price'];?>
                                                </td>
                                                    <?php }?>    
                                                    <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) {?>
                                                <td>
                                                    <input type="text" name="aprice" value="<?php echo $value['annual_price'];?>">
                                                </td>
                                                    <?php } else { ?>
                                                <td>
                                                <?php echo $value['annual_price'];?>
                                                </td>
                                                    <?php }?>  

                                                    <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) {?>
                                                <td>
                                                    <input type="text" name="sku" value="<?php echo $value['sku'];?>">
                                                </td>
                                                    <?php } else { ?>
                                                <td>
                                                <?php echo $value['sku'];?>
                                                </td>
                                                    <?php }?>      





                                                      <!-- buttons  -->
                                                <td>   
                                                    <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) { ?>
                                            
                                                    <input type="hidden" name="id" value="<?php echo $value['id'];?>">                                            
                                                    <input type="submit"  name="update" Value="Update" class="btn btn-outline-warning" onclick="return  confirm('Do You Want to Update The Product??')"></td>
                                                
                                                    <?php } else {?>
                                              
                                                <input type="hidden" name="id" value="<?php echo $value['id']; ?>">
                                                    <input type="submit" class="btn btn-outline-danger" name="edit" value="Edit" onclick="return  confirm('Do You Want to Edit The Product??')">
                                               
                                                    <?php }?>    
                                            
                                                    
                                                </td>
                                                <td>
                                                    <a href="deleteproduct.php?id=<?php  echo $value['id']; ?>" class="btn btn-outline-primary" onclick="return  confirm('Do You Want to Delete The Product??')">Delete</a>
                                                </td>
                                                </form>
                                            </tr>
                                           
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php require "footer.php";?>