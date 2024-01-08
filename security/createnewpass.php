<?php
session_start();
  function test_input($data) {
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {    
     $pass=test_input($_POST['password']);  
     $cpass=test_input($_POST['password2']);  
     
     // checking if input are empty
     if (empty($pass) || empty($cpass))
     {
      $_SESSION['err'] = "All fields are required";
     }
     else
     {
         if($pass === $cpass)
         { 
           $email= $_SESSION['email'];
           $hasspass=password_hash($cpass, PASSWORD_DEFAULT); //generating hash password
           $conn=mysqli_connect("localhost","root","","library");
           if(isset($_SESSION['adminfp'])==true){
              $qry="UPDATE admin SET Pass='$hasspass' WHERE Email='$email' ";
           }
           else{
              $qry= "UPDATE members SET Pass='$hasspass' WHERE Email='$email' ";
           }
           $test=mysqli_query($conn,$qry);
           if($test){
             $_SESSION['mess'] ="Password has been changed";
             if(isset($_SESSION['adminfp'])==true){
              header('Location:../adminlogin.php');
             }
             else{
               header('Location:../login.php');
             }
             
           }
           else{
            $_SESSION['err'] = "Passwors hasn't changed";
           }
         }
         else 
         {
           $_SESSION['err'] = "Password and Confirm Password Does Not Match";
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
    <style>

      .jmess{
        font-size: 12px;
        margin: 7px;
        position: relative;
        top: 2px;
        color: red;

      }
      /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

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
     <!-- <a class="btn"  href="../index.php">Back</a> -->
   </nav>
 <?php
      include('../Query/Get_Message.php');
 ?>
   <section>
      <div class="wrapper">
             <div class="form-box login">
                  <h2>Create New Password</h2>
                  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name="valid" autocomplete="off">
                      <div class="input-box">
                         <input type="password" name="password" required oninput="this.className = ''"  id="contact-pass" onkeyup="validatePass()">      
                         <span class="jmess" id="pass-error"></span>
                         <label>Create Password</label>
                      </div>
                     
                      <div class="input-box">
                         <input type="password" name="password2" required oninput="this.className = ''" id="con-pass" onkeyup="validateconPass()">
                         <span class="jmess" id="pass-check"></span>
                         <label>Confirm Password</label>
                      </div>

                   
                     <button type="submit" class="subbtn" name="crbtn">Continue</button> 
                  </form>
             </div>
      </div> 
   </section>
  
   <script src="../js/script.js"></script> 
 
 </body>
 </html>