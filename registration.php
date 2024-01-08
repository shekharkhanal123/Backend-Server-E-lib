<?php

$name=test_input($_POST['name']);
$add= test_input($_POST['Address']);
$phone= test_input($_POST['phone']);
$email=test_input($_POST['email']);
$pass=test_input($_POST['password']);  
$cpass=test_input($_POST['password2']);  


function test_input($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

       $conn=mysqli_connect("localhost","root","","library");
       $query="SELECT * FROM members ";
       $test=mysqli_query($conn,$query);
       if(mysqli_num_rows($test) > 0) //checking if there is user ID 
       { 
        $qrys="SELECT * FROM members WHERE User_Name='$name'";
        $namecheck=mysqli_query($conn,$qrys);
 
        $qry="SELECT * FROM members WHERE Email='$email'";
        $emailcheck=mysqli_query($conn,$qry);
        if(mysqli_num_rows($namecheck)> 0 && mysqli_num_rows($emailcheck)> 0){
            echo json_encode(array('message'=>"User already exist"));
        }
        elseif(mysqli_num_rows($namecheck)> 0 ){
            echo json_encode(array('message'=>"Username already exist"));
        }
        elseif(mysqli_num_rows($emailcheck)> 0 ){
            echo json_encode(array('message'=>"Email already exist"));
        }
        else{
          if($pass === $cpass)
          {
            $otp = rand(999999, 111111); //generating code
            $_SESSION['authentication']=true;
            $_SESSION['new']=true;
            $_SESSION['name']=$name;
            $_SESSION['add']=$add;
            $_SESSION['phone']=$phone;
            $_SESSION['email']=$email;
            $_SESSION['pass']=$cpass;
            $_SESSION['code']=$otp;

            $_SESSION['subject'] = "Email Authentication";
            $_SESSION['message'] = "email authentication";  

            header('Location:security/OTP.php');
          }
          else 
          {
            echo json_encode(array('message'=>"Password and Confirm Password Does Not Match"));
          }
         }
       }
       else
       {
        if($pass === $cpass)
          {
            $hasspass=password_hash($cpass, PASSWORD_DEFAULT); //generating hash password
            $otp = rand(999999, 111111); //generating code
            $_SESSION['authentication']=true;
            $_SESSION['new']=true;
            $_SESSION['name']=$name;
            $_SESSION['add']=$add;
            $_SESSION['phone']=$phone;
            $_SESSION['email']=$email;
            $_SESSION['pass']=$hasspass;
            $_SESSION['code']=$otp;
            $_SESSION['subject'] = "Email Authentication";
            $_SESSION['message'] = "email authentication";  
            
            header('Location:security/OTP.php');
          }
          else 
          {
            echo json_encode(array('message'=>"User already exist"));
            $_SESSION['err'] = "Password and Confirm Password Does Not Match";
          }
       }
?>