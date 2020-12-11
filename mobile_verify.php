
<?php
    session_start();
if ($_SESSION['check']== "") {
    header("location:login.php");
}
    $error= array();
    $msg="";
    $id= $_SESSION['check'];
    require "class/Dbcon.php";
require "class/User.php";
$db = new Dbcon();
$mobile = new User();
// $data = $p_ride->pending_count($db->conn);
$mob=$mobile->check($id, $db->conn);
// $mobile['mobile'];
$dbnum =  $mob['mobile'];

if (isset($_POST['submit'])) {
    $number= $_POST['number'];
    if ($dbnum == $number) {
        $_SESSION['mobile']=$_POST['number'];
        $otp = rand(100000, 999999);
        $_SESSION['session_otp'] = $otp;
        $message = rawurlencode("Your One Time Password is ".$otp);
        $fields = array(
            "sender_id" => "FSTSMS",
            "message" => ".$message.",
            "language" => "english",
            "route" => "p",
            "numbers" => "$number",
            "flash" => "1"
        );

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($fields),
            CURLOPT_HTTPHEADER => array(
            "authorization: NUX1gwsVKLF4m576jC3ueMJcIviPlySkz0Rr8OZhbE2Gt9xYHqiGTCmlUOIuQjeY0KfoXLWvaqzyZkVn",
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        } else {
        }
    } else {
        echo "<script type='text/javascript'>alert('Mobile Number Dosent Match');</script>";
       

    }
}
if (isset($_POST['verify'])) {
    $number= $_POST['otp'];
    if ($_SESSION['session_otp']==$number) {
        $update = new User();
        $update->update($id, $db->conn);
        unset($_SESSION['check']);
        if ($update) {
            echo "<script type='text/javascript'>alert('Congratulation Your Mobile Number has Been verified Please Login to countinue');
            window.location.href='login.php'</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('OTP Dosen't Match');</script>";
        unset($_SESSION['mobile']);
        unset($_SESSION['check']);
    }
}
?>
<?php require "header.php" ?>
<div class="container  otp-page">
<div class="register-top-grid">
<a class="btn btn-primary btn-danger" href="index.php">Verify By Email</a>
            <form action="mobile_verify.php" method="POST" class="login-form" >
                <h1><span>Verify Mobile Number<label>*</label></span></h1>
                <div class="form-input-material">
                    <input type="number" name="number" id="mobile" maxlength = "10" minlength = "10" placeholder="Please Enter your Mobile Number" autocomplete="off" value="<?php echo $dbnum; ?>" readonly="true"  required />
                </div>
                <button type="submit" name="submit" id="sign-up" class="btn btn-primary btn-ghost">Send OTP</button>
                <div id="val" class="pt-3 cyan-text"><?php echo "<b>".$msg."</b>" ?>
                </div>
                
                <a class="btn btn-primary btn-ghost" href="index.php">Back To Main Page</a>
            </form>
            <?php if (isset($_POST['submit'])  && $dbnum == $number ) {?>
            <form action="mobile_verify.php" method="POST" class="login-form1" >
                <h1><sign-up>Enter OTP HERE</sign-up></h1>
                <div class="form-input-material">
                        <input type="number" name="otp" id="mobile" maxlength = "10" minlength = "10" placeholder="OTP" autocomplete="off"  />
                </div>
                <button type="submit" name="verify" id="sign-up" class="btn btn-primary btn-ghost">Submit OTP</button>
            </form> 
            <?php } ?>   
</div>
</div>

<div class="clearfix">
                        </div>
                        
      
<?php require "footer.php";?>