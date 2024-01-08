<?php
 session_start();
 $_SESSION['adminfp']=true;
 if(isset($_SESSION['admin_email']) == true){
    header('Location:admin/dashboard.php');
 }
 else{

if($_SERVER["REQUEST_METHOD"] == "POST")
   {
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $conn=mysqli_connect("localhost","root","","library");
    $qry="SELECT * FROM admin WHERE Email='$email'";
    $emailcheck=mysqli_query($conn,$qry);
    if(mysqli_num_rows($emailcheck)>0)//checking if user email exist
    { 
       if($row= mysqli_fetch_assoc($emailcheck))
       {
               if(password_verify($pass,$row['Pass']))//checking if user password matches
               {
                $_SESSION['admin_email'] = true;
                $_SESSION['admin_email'] = $row['Email'];
                header('Location:admin/dashboard.php');
               }
               else{
                   $_SESSION['err'] ="Wrong Password";
               }
       }
    }
    else{
       $_SESSION['err'] =" Invalid User";
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminLogin E-lib</title>
    <?php
    include ("logo.php");
    ?>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/form.css">
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
    <img src="img/Screenshot_2023-07-01_123715-removebg-preview.png" class="logo">
    <a class="btn" href="index.php">Back</a>
  </nav>
  <?php
     include('./Query/Get_Message.php');
?>
  <section>
     <div class="wrapper">
            <div class="form-box login">
                 <h2>Admin Login</h2>
                 <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  name="valid" autocomplete="off">
                   <div class="input-box" >
                       <span class="icon"><ion-icon name="mail"></ion-icon></span>
                       <input type="email"  name="email" id="contact-email" onkeyup="validateEmail()" required>
                       <label>Email</label> 
                       <span id="email-error"></span>
                   </div>

                   <div class="input-box" >
                       <input type="password" class="password" name="password" id="contact-pass" onkeyup="validatePass()" required>
                       <!-- <span id="pass-error"></span> -->
                       <label>Password</label>
                   </div>

                   <div class="remember-forgot">
                       <!-- <label><input type="checkbox">Remember me</label> -->
                       <a href="security/resetpass.php">Forgot password</a>
                   </div>
                  
                   <button type="submit" class="subbtn" name="btn">Login</button> 
                  
                 </form>
            </div>
     </div> 
  </section>
  <script src="js/script.js"></script> 
</body>
</html>
<?php } ?>