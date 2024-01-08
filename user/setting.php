<?php
session_start(); 
function test_input($data) {
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
}
 $name=$_SESSION['User_Name'];
 
// to update picture

if(isset($_POST['uadd']) && $_FILES['image']){

      $image = $_FILES['image']['name'];
      $size = $_FILES['image']['size'];
      $tmp_name = $_FILES['image']['tmp_name'];
      $error = $_FILES['image']['error'];

      if($error === 0){

            $fileExtension = strtolower(pathinfo($image, PATHINFO_EXTENSION));
            $allow_ex = array("jpg", "jpeg", "png");

            if(in_array($fileExtension, $allow_ex)){

                  if($size > 2000000){

                        $_SESSION['err'] = "File size is too large!";

                  }else{

                        include("../Query/Upload_Image.php");
                    
                  }

            }else{
              $_SESSION['err'] = "Invalid file type; Must be [ jpg, jpeg, png ]";
            }
            
      }else{
            $_SESSION['war'] = "Select a picture!"; 
      }

}

// tp remove picture

if(isset($_POST['rem'])){

      $conn = mysqli_connect("localhost","root","","library");
      $qrys="SELECT * FROM image WHERE User_Name='$name'";
      $namecheck=mysqli_query($conn,$qrys);
     
      //if user pp is available
      if(mysqli_num_rows($namecheck)> 0)
      {
         $querys= "DELETE  FROM image WHERE user_name='$name'";
         $test=mysqli_query($conn,$querys);
         if($test==true){
            $_SESSION['mess'] = "Sucessfully Removed ";
         }
      }
      else //if user pp isn't available
      {  
            $_SESSION['err'] = "There is no profile pic!";
      }
        
}
if(isset($_POST['pbtn'])){

      if(isset($_SESSION['is_login'])==true)
      {   
          $conn = mysqli_connect("localhost","root","","library");
          $tname='members';
          $name = $_SESSION['User_Name'];
          $cpass=test_input($_POST['cpass']);  
          $npass=test_input($_POST['npass']);  
          $conpass=test_input($_POST['conpass']);  
          $querys= "SELECT * FROM members WHERE User_Name = '$name'";
          $test=mysqli_query($conn,$querys);
          if($test== true){
                include("../Query/Change_User_Info.php");
          }
          
      }
      else{
            $_SESSION['err'] = "Failed to change !";
      }
}
elseif(isset($_POST['sbtn'])){

      if(isset($_SESSION['is_login'])==true)
      {   
          $conn = mysqli_connect("localhost","root","","library");
          $tname='members';
          $name = $_SESSION['User_Name'];
          $uadd=test_input($_POST['uadd']);  
          $uphone=test_input($_POST['uphone']);  
          $cpass=test_input($_POST['cpass']);  
          $querys= "SELECT * FROM members WHERE User_Name = '$name'";
          $test=mysqli_query($conn,$querys);
          if($test== true){
                include("../Query/Change_User_Info.php");
          }
          
      }
      else{
            $_SESSION['err'] = "Failed to change !";
      }
}
elseif(isset($_POST['ebtn'])){

      if(isset($_SESSION['is_login'])==true)
      {   
          $conn = mysqli_connect("localhost","root","","library");
          $tname='members';
          $name = $_SESSION['User_Name'];
          $email=test_input($_POST['nemail']); 
          $cpass=test_input($_POST['cpass']);  
          $querys= "SELECT * FROM members WHERE User_Name = '$name'";
          $test=mysqli_query($conn,$querys);
          if($test== true){
                include("../Query/Change_User_Info.php");
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
<body onload="onload()"id="body">
<?php
 include ("../components/header.php");
 ?>

<div class=content >
<div class="settings">
   <div class="smenu">
         <div class="udata">
           <div class="udataimg">
             <img <?php include ("../Query/select_pp.php");?>/>
           </div>
           <div class="width">
              <a href="profile.php" class="udataname" >
                <div class="uname">
                     <?php
                     if(isset($_SESSION['is_login'])==true){
                      echo $_SESSION['User_Name'];
                     }
                     else{
                      ?>Guest Account<?php
                     }
                     ?>
                </div>
                <div class="uemail">
                    <?php
                     if(isset($_SESSION['is_login'])==true){
                      echo $_SESSION['Email'];
                     }
                     ?>
                </div>
              </a>
           </div>
         </div>
         <hr>
         <div class="jumper">
           <div class="jitem"><a href="./setting.php#Profile" ><i class="fa-solid fa-user"></i><div>Profile</div></a></div> 
           <div class="jitem"><a href="./setting.php#Email" ><i class="fa-solid fa-envelope"></i><div>Email</div></a></div>
           <div class="jitem"><a href="./setting.php#Password" ><i class="fa-solid fa-gear"></i><div>Password</div></a></div>
         </div>
   </div>
   <div class="soption">
    
         <div  class="bottom-margin" >
             <div id="Profile" class="gapdina"></div>
             <div id="Profile" class="sopname"> Profile </div>
             <div class="fbody">
                  <form class="form" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                        <div class="file">
                          <div as="ul" class="data">
                               <div id="upload">
                                      <div class="cgimgbd">
                                            <input  type="file" id="file" accept="image/png,image/jpeg,image/gif,image/webp" id="image" name="image" value="Change"/>    
                                            <label for="file" class="change">Select</label>
                                            <div class="cgimg">
                                              <img <?php include ("../Query/select_pp.php");?> />
                                            </div>
                                      </div> 
                               </div>
                              <div style=" display: grid; gap: 15px;">
                               <input type="submit" value="Upload"  name="uadd"/>
                               <input type="submit" value="Remove"  name="rem"/>
                              </div>
                           </div>
                        </div>     
                  </form>
                  <!-- form -->
                  <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="file"> 
                           <div as="ul" class="data">
                                 <li class="name">Adress:</li>
                                 <li class="value"><input type="text" placeholder="<?php echo $_SESSION['Address']; ?>"  name="uadd"/></li>
                           </div>
                           <div as="ul" class="data">
                                 <li class="name">Phone:</li>
                                 <li class="value"><input type="text" placeholder="<?php echo $_SESSION['Phone']; ?>"  name="uphone"/></li>
                           </div>
                           <div as="ul"  class="data">
                                 <li class="name">Password:</li>
                                 <li class="value"><input type="password" placeholder="Confirm"  name="cpass" required/></li>
                           </div>
                           <div style="display: flex;justify-content: end;">
                              <input type="submit" value="Change" class="querybtn"  name="sbtn"/>
                           </div>
                        </div>
                  </form>
                  <!-- form close -->
             </div>
         </div>
         
         <div  class="bottom-margin" >
             <div id="Email" class="gapdina" style="top:423px;"></div>
             <div id="Email" class="sopname"> Email </div>
             <div class="fbody">
                   <!-- form -->
                   <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                         <div class="file">
                         <div as="ul"  class="data">
                              <li class="name">Email:</li>
                              <li class="value"><input type="email" placeholder="<?php echo$_SESSION['Email'];?>" name="nemail" /></li>
                         </div>
                         <div as="ul" class="data">
                              <li class="name">Password</li>
                              <li class="value"><input type="password" placeholder="Confirm"  name="cpass" required/></li>
                         </div>

                         <div style="display: flex;justify-content: end;"><input type="submit" value="Change" class="querybtn"  name="ebtn"/></div>
                         </div>
                   </form>
                   <!-- form close -->
             </div>
         </div>

         <div class="bottom-margin">
           <div id="Password" class="gapdina" style="top:721px;"></div>
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
                                <div><a href="../security/resetpass.php"id= "querybtn" class="querybtn">Forgot Password</a></div>
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