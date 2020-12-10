<?php 
require_once "class/Dbcon.php";
require "class/User.php";
$db = new Dbcon(); ?>
<?php
session_start();
if (isset($_POST['submit'])) {
    
    $email = isset($_POST['email'])?$_POST['email']:'';
    $password = md5(isset($_POST['pass'])?$_POST['pass']:'');
    $_SESSION['check'] = $email;
    $login_data = new User();
    $login_data->login($email, $password, $db->conn);
    // if ($login_data) {
    //     header("location:index.php");
    // }
}
require "header.php";
?>
    <!---header--->
        <!---login--->
            <div class="content">
                <div class="main-1">
                    <div class="container">
                        <div class="login-page">
                            <div class="account_grid">
                                <div class="col-md-6 login-left">
                                     <h3>new customers</h3>
                                     <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                                     <a class="acount-btn" href="account.php">Create an Account</a>
                                </div>
                                <div class="col-md-6 login-right">
                                    <h3>registered</h3>
                                    <p>If you have an account with us, please log in.</p>
                                    <form action="" method="POST">
                                      <div>
                                        <span>Email Address<label>*</label></span>
                                        <input type="text" name="email" title="please Enter Email in valid Format" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                        </div>
                                      <div>
                                        <span>Password<label>*</label></span>
                                        <input type="password" name="pass" class="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Must contain at least one number and one uppercase and lowercase letter, 
                                        and at least 8 to 16 characters">
                                </div>
                                      <a class="forgot" href="#">Forgot Your Password?</a>
                                      <input type="submit" value="Login" name="submit">
                                    </form>
                                </div>	
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- login -->
                <!---footer--->
                <?php require "footer.php"; ?>