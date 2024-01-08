<?php
$conn=mysqli_connect("localhost","root","","library");

$name=test_input($_POST['name']);
$email=test_input($_POST['email']); 

function test_input($data) {
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

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
  
  echo "Verified";
         
  }
}
else{

  echo "Verified";

  }
?>
