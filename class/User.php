<?php
/**
 *  Doc Comment for Page
 *
 * PHP version 7
 *
 * @category User_Class_File
 * @package  CED-HOSTING
 * @author   Cedcoss <sumitshukla@cedcoss.com>
 * @license  Personal use License
 * @link     https://localhost/
 */

 

/**
 *  Doc Comment of class
 *
 * @category User_Class
 * @package  CED-HOSTING
 * @author   Cedcoss <sumitshukla@cedcoss.com>
 * @license  Personal use License
 * @link     https://localhost/
 */

class User
{
    /**
     * Function for signup of the User
     * 
     */
    public function signup($email, $name, $mobile, $date, $password, $repassword, $sque, $sans, $conn)
    {
        $sql = "INSERT INTO `tbl_user`(`email`,`name`,`mobile`,`email_approved`,`phone_approved`,`active`,`is_admin`,`sign_up_date`,`password`,`security_question`,`security_answer`)
         VALUES ('".$email."','".$name."','".$mobile."',0,0,0,0,'".$date."','".$password."','".$sque."','".$sans."')";
        if ($conn->query($sql) === true) {
            echo "<script>alert('Details Inserted Successfully!!! Please Wait till Verification')</script>";
        } else {
            echo'<script>alert("'.$conn->error.'")</script>';
        }
    }
    /**
     * Function for login of the user
     */
    public function login($email, $password, $conn)
    {
        $sql1 = "SELECT * FROM `tbl_user`  WHERE `email`='".$email."' AND `password`='".$password."'";
        $result =$conn->query($sql1);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              
                if (($row['email_approved']==0 || $row['phone_approved']==0 ) && $row['active']==0) {
                    echo"<script>alert('Please Verify Your Mobile No or Email Address');
                    window.location.href='./mobile_verify.php'</script>";
                } else {
                    if ($row['is_admin']==1) {
                        $_SESSION['admin'] = $row['name'];
                        header('location:admin/dashboard.php');
                 
                    } elseif ($row['is_admin']==0) {
                        $_SESSION['userdata'] = array('username'=>$row['name'],'uid'=>$row['id']);
                         echo "<script>alert('Login Successful');</script>";
                         header('location:index.php');
                    } else {
                        unset($_SESSION);
                        echo "<script>alert('Access denied');</script>";
                    }
                }
            }
        } else {
            echo "<script>alert('Please Enter valid Login Details!!!');</script>";
        }
    }
    /**
     * Function of approve the Request of Users
     */
    public function update($id, $conn)
    {
        $sql = "UPDATE  `tbl_user` SET `phone_approved`=1 , `active` = 1 WHERE `email`='".$id."'";
     

        if ($conn->query($sql) === true) {
            return true;
        } else {
            echo $conn->error;
        }
    }
    /**
     * Function to check mobile no
     */
    public function check($id, $conn)
    {
        $sql = "SELECT  `mobile` from `tbl_user` WHERE `email`='".$id."'";
        $result =$conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        }
    }

}
