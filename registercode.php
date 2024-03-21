<?php
session_start();
include ('config/dbcon.php');

if (isset($_POST['register_btn'])) 
{

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password =mysqli_real_escape_string($con, $_POST['cpassword']);
    
    $phoneno = mysqli_real_escape_string($con, $_POST['phoneno']);
    
    $bdate = mysqli_real_escape_string($con, $_POST['bdate']);
    
   
    
    $sadd = mysqli_real_escape_string($con, $_POST['sadd']);
    
    $saddl2 = mysqli_real_escape_string($con, $_POST['saddl2']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $region = mysqli_real_escape_string($con, $_POST['region']);
    
    $postalcode = mysqli_real_escape_string($con, $_POST['postalcode']);
    if ($password == $confirm_password) 
    {

        // Check Email
        $checkemail = "SELECT email FROM users WHERE email='$email'";
        $checkemail_run = mysqli_query($con, $checkemail);
        if (mysqli_num_rows($checkemail_run) > 0) {
            // Already Email Exists
            $_SESSION['message'] = "Already Email Exists";
            header("Location: index.php");
            exit (0);
        } else {
            $user_query = "INSERT INTO users (fname,lname,email,password,phoneno,bdate,sadd,saddl2,city,region,postalcode) VALUES ('[$fname]','[$lanme]','[$email]','[$password]','[$phoneno]','[$bdate]','[$sadd]','[$saddl2]','[$city]','[$region]','[$postalcode]')";
            $user_query_run = mysqli_query($con, $user_query);

            if ($user_query_run) {
                $_SESSION['message'] = "RegisterEd Successfully";
                header("Location: login.php");
                exit (0);
            } else {
                $_SESSION['message'] = "Something Went Wrong!";
                header("Location: index.php");
                exit();
            }
        }
    } 
    else {
        $_SESSION['message'] = "Password and Confirm Password does not Match";

        header("Location:index.php");
        exit (0);
    }
} else {
    header("Location: index.php");
}

?>