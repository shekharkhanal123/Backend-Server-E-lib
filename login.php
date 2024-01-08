<?php
try{
$email=$_POST['email'];
$pass=$_POST['password'];


$conn=mysqli_connect("localhost","root","","library");
$query="SELECT * FROM members ";
$test=mysqli_query($conn,$query);
if(!empty(mysqli_num_rows($test))) //checking if there are any user ID 
{ 
  $qry="SELECT * FROM members WHERE Email='$email'";
  $emailcheck=mysqli_query($conn,$qry);
  if(mysqli_num_rows($emailcheck)>0)//checking if user email exist
  { 
     if($row= mysqli_fetch_assoc($emailcheck))
     {
             if(password_verify($pass,$row['Pass']))//checking if user password matches
             {
                echo "Success";
             }
             else{
                echo "wrgpass";
             }
     }
  }
  else{
    echo"hello";
  }
}
else{
  echo json_encode(array('message'=>"User doesn't exist"));}
}catch(Exception $e){
  echo json_encode(array('message'=>"Server isn't responding!"));
}
 ?>