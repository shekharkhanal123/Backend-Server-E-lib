<?php
$conn=mysqli_connect("localhost","root","","library");
require_once 'PHPMailer/Mailer.php';
$otp= gentOTP();


function test_input($data) {
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$cotp=test_input($_POST['cotp']);
$name=test_input($_POST['name']);
$add= test_input($_POST['Address']);
$phone= test_input($_POST['phone']);
$email=test_input($_POST['email']);
$cpass=test_input($_POST['password2']);  

if($cotp == $otp)
{
     
     $hasspass=password_hash($cpass, PASSWORD_DEFAULT); //generating hash password
     $conn=mysqli_connect("localhost","root","","library");
     $query= "INSERT INTO members(User_Name,Place,Phone,Email,Pass)VALUES('$name','$add','$phone','$email','$hasspass')";
     $ans=mysqli_query($conn,$query);
     if($ans==true)
     {   
      
      echo "Registered";

     }
     else{

      echo json_encode(array('message'=>"Failed to regiter"));

     }

}
else
{
  echo json_encode(array('message'=>"OTP doesn't match!"));
}

?>
