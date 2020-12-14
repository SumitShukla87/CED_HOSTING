<?php

/**
 *  Doc Comment for Page
 *
 * PHP version 7
 *
 * @category Sign_Up_Page
 * @package  CED-HOSTING
 * @author   Cedcoss <sumitshukla@cedcoss.com>
 * @license  Personal use License
 * @link     https://localhost/
 */


require "class/Dbcon.php";
require "class/User.php";

$db = new Dbcon();
$errors = array();
require "header.php"; 

if (isset($_SESSION['userdata']) || isset($_SESSION['admin'])) {
    header("location:logout.php");
}
?>

<?php
if (isset($_POST['register'])) {
    $name = strtolower(isset($_POST['name'])?$_POST['name']:'');
    $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';
    $date = date("Y-m-d h:i:s");
    
    $password = md5(isset($_POST['pass'])?$_POST['pass']:'');
    $repassword = md5(isset($_POST['repass'])?$_POST['repass']:'');
    $sque = isset($_POST['sque'])?$_POST['sque']:'';
    $sans = trim(isset($_POST['security_ans'])?$_POST['security_ans']:'', "");
    $date = date("Y-m-d h:i:s");

    $signup_data = new User();
    $check = new User();
    if ($name=="" || $mobile==" " || $email==" " || $password=="" || $repassword=="") {
        $errors[] = array('input'=>'form','msg'=>'Field can not be blank');
    } elseif (strlen($mobile)<10) {
        $errors[] = array('input'=>'form','msg'=>'Mobile No min contain 10 digits');
    }
    if ($password!=$repassword) {
        $errors[] = array('input'=>'password','msg'=>'Password doesnt match');
    }

    if (sizeof($errors)==0) {
        $signup_data->signup($email, $name, $mobile, $date, $password, $repassword, $sque, $sans, $db->conn);
    }
}
?>
<!---login--->
<div id="error">

<?php if (sizeof($errors) > 0) : ?>
    <?php foreach ($errors as $error):?>
        <?php echo'<script>alert("'.$error['msg'].'")</script>'?> 
    <?php endforeach?> 
<?php endif; ?>

</div>
<div class="content">
    <!-- registration -->
    <div class="main-1">
        <div class="container">
            <div class="register">
                <form action="" method="POST" id="reg_form">
                    <div class="register-top-grid">
                        <h3>
                            personal information
                        </h3>
                        <div>
                            <span>Name<label>*</label></span>
                            <input type="text" name="name" class="nameclass" id="fname"   title="Please Enter name in valid Format"  required>
                            <span class="error"><p id="name_error"></p></span>
                        </div>
                        <div>
                            <span>Mobile<label>*</label></span>
                            <input type="text" name="mobile" class="mobile" id="mobile"  pattern="^(|[0]){0,1}([1-9]{1})([0-9]{9})$" required>
                            <span class="error"><p id="telephone_error"></p></span>
                        </div>
                        <div>
                            <span>Email Address<label>*</label></span>
                            <input type="text" name="email" class="password" id="email" title="please Enter Email in valid Format" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                            <span class="error"><p id="email_error"></p></span>
                        </div>
                        <div>
                            <span>Security Question<label>*</label>     
                            </span>
                            <select name="sque">
                            <option value="What was your childhood nickname?">What was your childhood nickname?</option>
                            <option value="What is the name of your favourite childhood friend?">What is the name of your favourite childhood friend?</option>
                            <option value="What was your favourite place to visit as a child?">What was your favourite place to visit as a child?</option>
                            <option value="What was your dream job as a child?">What was your dream job as a child?</option>
                            <option value="What is your favourite teacher's nickname?">What is your favourite teacher's nickname?</option>
                             </select>
                            <input type="text" name="security_ans" id="sans" title="Only Alphabetic and AlphaNumeric are allowed" pattern='^[0-9]*[A-Za-z]+[0-9]*$' required>
                        </div>

                        <div class="clearfix">
                        </div>
                        <a class="news-letter" href="#">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i>
                                </i>Sign Up for Newsletter</label>
                        </a>
                    </div>
                    <div class="register-bottom-grid">
                        <h3>
                            login information
                        </h3>
                        <div>
                            <span>Password<label>*</label></span>
                            <input type="password" name="pass" class="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" title="Must 
                            contain at least one number and one uppercase and lowercase letter, 
                            and at least 8 to 16 characters" required>
                        </div>
                        <div>
                            <span>Confirm Password<label>*</label></span>
                            <input type="password" name="repass" class="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$" title="Must 
                            contain at least one number and one uppercase and lowercase letter and one special character, 
                            and at least 8 to 16 characters" required>
                        </div>
                        
                        
                    </div>
              
                <div class="clearfix">
                </div>
                <div class="register-but">
                    
                        <input type="submit" value="submit" id="re1g " name="register">
                        <div class="clearfix">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- registration -->
</div>
<!-- login -->
<?php require "footer.php"; ?>
<!-- <script>
    $(document).ready(function(){
        $("#fname").on("blur",function(){
            var  name=$("#fname").val()
            if(name==0){
                $("#fname").css("border","1px solid red");
                $(".error").html(" Name Is Requird!!");
                // $("#product_sku").css({"border-color":"red"});
                $(".error").show(1000);
                $(".error").fadeOut(3000);

                return false;
            }
        })
    })
    var fname=document.getElementById("fname").value;
    console.log(fname)
</script> -->
