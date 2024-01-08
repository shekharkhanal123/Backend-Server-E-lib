<?php
session_start();
$check='block';
$code='none';


if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $phone=$_POST['phome'];

  if( empty($phone))
  {
     $_SESSION['err'] =" Every field is required";
  }
  else
  {
   $conn=mysqli_connect("localhost","root","","library");
   if(isset($_SESSION['adminfp'])==true){
    $query="SELECT * FROM admin ";
   }
   else{
    $query="SELECT * FROM members ";
   }
   
   $test=mysqli_query($conn,$query);
   if(!empty(mysqli_num_rows($test))) //checking if there are any user ID 
   { 
     $qry="SELECT * FROM members WHERE Phone='$phone'";
     $phonecheck=mysqli_query($conn,$qry);
     if(mysqli_num_rows($phonecheck)>0)//checking if user email exist
     { 
      $_SESSION['mess'] ="We've send OTP to the ".$phone;
      $check="none";
      $code="block";
     }
     else{
        $_SESSION['war'] ="Email doesn't exist";
     }
   }
   else{
      $_SESSION['war'] ="Email doesn't exist";
   }
  }
}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login E-lib</title>
     <?php
     include ("logo.php");
     ?>
     <link rel="stylesheet" href="../css/main.css">
     <link rel="stylesheet" href="../css/header.css">
     <link rel="stylesheet" href="../css/form.css">
     <link rel="stylesheet" href="icon-css/all.min.css">
     <link rel="stylesheet" href="icon-css/fontawesome.min.css">
 <style>
     .btn{
         color:#fff;
     }
     .btn:hover{
         color:#fff;
     }
     .message{
        top: 74px;
        color: #fff;
        background: #1c2333;
    }
 </style>
 </head>
 <body style="margin-left:0px;display: flex;justify-content: center;align-items: center;">
   <nav class="nav" style="background: #0E1525;" >
     <img src="../img/Screenshot_2023-07-01_123715-removebg-preview.png" class="logo">
     <!-- <a class="btn"  href="../login.php">Back</a> -->
   </nav>
 <?php
      include('../Query/Get_Message.php');
 ?>
   <section>
      <div class="wrapper">
        <div class="form-box login">
          <h2>Forget Password</h2>
          <!-- form for confirmation email -->
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name="valid" autocomplete="off" style="display:<?php echo $check?>;" >
                 <!-- message block -->
                 <div class="wrapper" style=" background: #2b2b2b; box-shadow: none; height: fit-content; width: -webkit-fill-available; margin: 3% 0px;    border: 1px solid #616161; border-radius: 10px;">
                   <div class="form-box login" style=" padding: 7px;">
                     <span style=" font-size: clamp(10px,15px,1em);    color: #d3d3d3;"><b   style=" color: #ccbebe;" >Note:</b> Enter the phone no. you had use to register with!</span>
                   </div>
                 </div>
                 <!-- Input block -->
                 <div>
                   <div class="input-box" style="margin: 2% 0px 4% 0px;">
                     <input type="text"  name="phone" id="contact-email" required>
                     <label>Phone</label> 
                     <span id="email-error"></span>
                   </div>
                   <div class="remember-forgot">
                     <a href="resetpass.php">Use Email?</a>
                   </div>
                   <button type="submit" class="subbtn" name="ebtn">Continue</button> 
                 </div>
          </form>


           <!-- form for OTPcode reader -->
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name="valid" autocomplete="off" style="display:<?php echo $code?>;"> 
                  <!-- message block -->
                  <div class="wrapper" style=" background: #2b2b2b; box-shadow: none; height: fit-content; width: -webkit-fill-available; margin-top: 16px;    border: 1px solid #616161; border-radius: 10px;">
                   <div class="form-box login" style=" padding: 7px;">
                     <span style=" font-size: clamp(10px,15px,1em);    color: #d3d3d3;"><b   style=" color: #ccbebe;" >Note:</b> OTP only valid for 60 sec!</span>
                   </div>
                 </div>
                 <!-- Input block -->
                 <div class="input-box">
                     <input type="email"  name="email" id="contact-email" required>
                     <label>OTP Code</label> 
                     <span id="email-error"></span>   
                 </div>
                 <button type="submit" class="subbtn" name="cbtn">Continue</button>
          </form>
        </div>
      </div> 
   </section>
   <script src="../js/script.js"></script>
 </body>
 </html>