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
    <?php
    if (isset($_POST['block'])) {
        $id = isset($_POST['id'])?$_POST['id']:'';
        echo $id;
        $prod->hide($id, $db->conn);
    }
    if (isset($_POST['unblock'])) {
        $id = isset($_POST['id'])?$_POST['id']:'';
        echo $id;
        $prod->show($id, $db->conn);
    }

    if (isset($_POST['update'])) {
        $id = strtolower(isset($_POST['id'])?$_POST['id']:'');
        $name = isset($_POST['name'])?$_POST['name']:'';
        $link = isset($_POST['link'])?$_POST['link']:'';
        $prod->updateCategory($id, $name, $link, $db->conn);
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
                  <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                </div>
                <!-- List group -->
                <div class="list-group list-group-flush">
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm"><?php echo$_SESSION['admin'];?></h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>5 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                      <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>2 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                      </div>
                    </div>
                  </a>
                  <a href="#!" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <!-- Avatar -->
                        <img alt="Image placeholder" src="assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                      </div>
                      <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                            <h4 class="mb-0 text-sm">John Snow</h4>
                          </div>
                          <div class="text-right text-muted">
                            <small>3 hrs ago</small>
                          </div>
                        </div>
                        <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                      </div>
                    </div>
                  </a>
                </div>
                <!-- View all -->
                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
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
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
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
                        <form action="" method="POST">
                            <hr>
                            <h1 class="text-orange text-dark">
                                Create Category
                            </h1>
                            <hr>
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
                                <label for="subcat" class="form-control-label">Add Sub-Category</label>
                                <input class="form-control" type="text" name="sub_category" required placeholder="Enter Sub-Category Here" id="subcat">
                            </div>
                            <div class="form-group">
                                <label for="link" class="form-control-label">Link Address</label>
                                <!-- <input class="form-control" type="text" name="link" required placeholder="Enter Link-Address Here" id="linkk"> -->
                             
                                          <textarea id="editor" name="link"></textarea>
   

                            </div>
                            <input type="submit" name="add" class="btn btn-outline-danger" value="Add-Sub-category">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <div>
                            <div class="container">
                                <hr>
                                <h1>
                                    Details Of Categories
                                </h1>
                                <hr>
                                <table id='example' class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">
                                                Id
                                            </th>
                                            <th scope="col" class="sort">
                                                Category
                                            </th>
                                            <th scope="col">
                                                Sub-Category
                                            </th>
                                            <th scope="col">
                                                Visible/Not Visible
                                            </th>
                                            <th scope="col">
                                                Launch Date
                                            </th>
                                            <th scope="col">
                                                Edit
                                            </th>
                                            <th scope="col">
                                                Delete
                                            </th>
                                            <?php if (isset($_POST['edit'])) { ?>
                                            <th>
                                              Show/Hide Category
                                            </th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-dark" >
                                        <?php $details =$prod->showAllcategory($db->conn);
                                        foreach ($details as $key=> $value) {?>
                                        
                                        
                                        <tr>
                                        <form action="" method="POST">
                                            <td>
                                                <?php echo $value['id']; ?></td>
                                            <td>
                                                <?php $serv = $value['prod_parent_id'];;
                                                if ($serv==1) {
                                                    echo "Hosting";
                                                }
                                                ?></td>
                                            <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) { ?>
                                            <td>
                                                <input type="text" name="name" value="<?php echo $value['prod_name'] ?>">
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
                                                } elseif ($status==0) {
                                                    echo "Hidden";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo $value['prod_launch_date'];?>
                                            </td>                                           
                                            <td>
                                            <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) { ?>
                                            
                                            <input type="hidden" name="id" value="<?php echo $value['id'];?>">                                            
                                            <input type="submit"  name="update" Value="Update" class="btn btn-outline-warning" onclick="return  confirm('Do You Want to Update The Category??')"></td>
                                          
                                            <?php } else {?>
                                              
                                              <input type="hidden" name="id" value="<?php echo $value['id'];?>">
                                              <input type="submit" class="btn btn-outline-danger" name="edit" value="Edit">
                                          
                                            <?php }?>
                                            <td>
                                          <a href="deletecategory.php?id=<?php  echo $value['id']; ?>" class="btn btn-outline-success" onclick="return  confirm('Do You Want to Delete The Category??')">Delete</a>
                                            </td>
                                            <?php if (isset($_POST['edit']) && $value['id']  == $_POST['id']) { ?>
                                                <?php if ($status==0) {?>
                                                    <td><input type="submit" name="unblock"  class="btn btn-outline-dark" Value="Show Category" onclick="return  confirm('Do You Want to Show The Category??')"></td>

                                                <?php  } elseif ($status==1) { ?>
                                                        <td><input type="submit" name="block"  class="btn btn-outline-dark" Value="Hide Category" onclick="return  confirm('Do You Want to Hide The Category??')"></td>

                                                <?php }
                                                } ?>
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
<script src="https://cdn.tiny.cloud/1/l21oykp5bx4mzkwhrdoq0lbtcezl9dq0owjq0db3lqf3h8d9/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
  <script>
    tinymce.init({
      selector: 'textarea#editor',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste image table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>

<?php require "footer.php";?>