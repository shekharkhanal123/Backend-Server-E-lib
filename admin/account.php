<?php
 session_start(); 
function test_input($data) {
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
if(isset($_POST['aebtn'])){

      if(isset($_SESSION['admin_email'])==true)
      {   
          $conn = mysqli_connect("localhost","root","","library");
          $tname='admin';
          $name = $_SESSION['admin_email'];
          $email=test_input($_POST['nemail']); 
          $cpass=test_input($_POST['cpass']);  
          $querys= "SELECT * FROM admin";
          $test=mysqli_query($conn,$querys);
          if($test== true){
                include("../Query/Change_Admin_Info.php");
          }
          
      }
      else{
            $_SESSION['err'] = "Failed to change !";
      }

}
elseif(isset($_POST['pbtn'])){
  
      if(isset($_SESSION['admin_email'])==true)
      {   
          $conn = mysqli_connect("localhost","root","","library");
          $tname='admin';
          $name = $_SESSION['admin_email'];
          $cpass=test_input($_POST['cpass']);  
          $npass=test_input($_POST['npass']);  
          $conpass=test_input($_POST['conpass']);  
          $querys= "SELECT * FROM admin WHERE Email = '$name'";
          $test=mysqli_query($conn,$querys);
          if($test== true){
                include("../Query/Change_Admin_Info.php");
          }
          
      }
      else{
            $_SESSION['err'] = "Failed to change !";
      }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Settings E-lib</title>
    <?php
     include ("../components/logo.php");
     ?>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/setting.css">
    <link rel="stylesheet" href="../css/data.css">
<style>
  #settingbtn{
        background-color: var(--select-bg-color);
        border-top:  1px solid var(--select-border-color);
        border-bottom:  1px solid var(--select-border-color);
        transition: 0.5s;
  }
   .s{
    display: flex;
    padding: 10px 52% 10px 45px;
     }

     .fbody{
    display: block;
}
 
</style>  
</head>
<body  onload="onload()"id="body">
<?php
 include ("../components/adminheader.php");
 ?>

<div class="content">

<div class="settings" style="padding-bottom: 66px;padding-top: 30px;">
   <div class="smenu" >
         <div class="udata">
             <div class="udataimg">
               <img src="../Uploads/d0tb7.jpg">
             </div>
             <div class="width">
                <a  class="udataname" >
                  <div class="uname">
                       <?php if(isset($_SESSION['admin_email'])==true){
                        echo $_SESSION['admin_email'];
                       } ?>
                  </div>
                </a>
             </div>
         </div>
         <hr>
         <div class="jumper">
             <div class="jitem"><a href="./account.php#Email" ><i class="fa-solid fa-envelope"></i><div>Email</div></a></div>
             <div class="jitem"><a href="./account.php#Password" ><i class="fa-solid fa-gear"></i><div>Password</div></a></div>
         </div>
   </div>
   <div class="soption">   
           <div  class="bottom-margin" style=" margin-bottom: 60px;" >
           <div id="Email" class="gapdina"></div>
           <div id="Email" class="sopname"> Email </div>
           <div class="fbody">
              <!-- form -->
              <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
              <div class="file">
                  <div as="ul"  class="data">
                        <li class="name">Email:</li>
                        <li class="value"><input type="email" placeholder="<?php echo$_SESSION['admin_email'];?>" name="nemail" /></li>
                  </div>
                  <div as="ul" class="data">
                        <li class="name">Password</li>
                        <li class="value"><input type="password" placeholder="Confirm"  name="cpass" required/></li>
                  </div>

                    <div style="display: flex;justify-content: end;"><input type="submit" value="Change" class="querybtn"  name="aebtn"/></div>
              </div>
              </form>
              <!-- form close -->
           </div>
           </div>
         
         
           <div class="bottom-margin">
           <div id="Password" class="gapdina" style="top: 208px;"></div>
           <div id="Password" class="sopname" > Password </div>
           <div class="fbody">
             <!-- form -->
             <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
             <div class="file">
             <div as="ul"  class="data">
                        <li class="name">Current Password:</li>
                        <li class="value"><input type="password" placeholder="current password"  name="cpass" required/></li>
                  </div>
                  
                  <div as="ul" class="data">
                        <li class="name">New Password:</li>
                        <li class="value"><input type="password"  placeholder="new password" name="npass" required/></li>
                  </div>
                  <div as="ul" class="data">
                        <li class="name">Confirm Password</li>
                        <li class="value"><input type="password" placeholder="confirm password"  name="conpass" required/></li>
                  </div>
                  <div class="forgot_btn">
                        <div><a href="../security/resetpass.php" id= "querybtn" class="querybtn">Forgot Password</a></div>
                        <div><input type="submit" value="Change" class="querybtn" name="pbtn"/></div>
                  </div>
             </div>
             </form>
             <!-- form close -->
           </div>
           </div>
   </div>
</div> 
</div>  
</body>
</html>