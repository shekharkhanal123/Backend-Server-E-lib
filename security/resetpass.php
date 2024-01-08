<?php
session_start();

if(isset($_POST["ebtn"]))
{
  $email = $_POST['email'];
 
  if(empty($email))
  {
     $_SESSION['err'] =" Every field is required";
  }
  else
  { 
   $conn=mysqli_connect("localhost","root","","library");
   if(isset($_SESSION['adminfp'])==true){
    $qry="SELECT * FROM admin WHERE Email='$email'";
   }
   else{
     $qry="SELECT * FROM members WHERE Email='$email'";
   }
   $emailcheck=mysqli_query($conn,$qry);
   if(mysqli_num_rows($emailcheck)>0)//checking if user email exist
   { 
    $otp = rand(999999, 111111); //generating code
    if($row= mysqli_fetch_assoc($emailcheck))
      {
        if(isset($_SESSION['adminfp'])==true){
          $_SESSION['name']="admin";
        }
        else{
          $_SESSION['name'] = $row['User_Name'];
        }
        $_SESSION['email']=$email;
        $_SESSION['code']=$otp;
        $_SESSION['new']=true;
        $_SESSION['resetpss']=true;

        $_SESSION['subject']="Password Recovery"; 
        $_SESSION['message']="password recovery";

        header('Location:OTP.php');
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
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name="valid" autocomplete="off" >
                 <!-- message block -->
                 <div class="wrapper" style=" background: #2b2b2b; box-shadow: none; height: fit-content; width: -webkit-fill-available; margin: 3% 0px;    border: 1px solid #616161; border-radius: 10px;">
                   <div class="form-box login" style=" padding: 7px;">
                     <span style=" font-size: clamp(10px,15px,1em);    color: #d3d3d3;"><b   style=" color: #ccbebe;" >Note:</b> Enter the email you had registered with!</span>
                   </div>
                 </div>
                 <!-- Input block -->
                 <div>
                   <div class="input-box" style="margin: 2% 0px 4% 0px;">
                     <input type="email"  name="email" id="contact-email" required>
                     <label>Email</label> 
                     <span id="email-error"></span>
                   </div>
                   <div class="remember-forgot">
                     <!-- <a href="resetemail.php">Use Number?</a> -->
                   </div>
                   <button type="submit" class="subbtn" name="ebtn">Continue</button> 
                 </div>
          </form>

        </div>
      </div> 
   </section>
   <script src="../js/script.js"></script>
 </body>
 </html>