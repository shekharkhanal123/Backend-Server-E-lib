<?php
 session_start(); 

 $history='none';
 $borrowed='block';
 $returned='none';
 $bbackground_color= '--select-bg-color';
 
 if(isset($_POST['hbtn'])){
  $history='block';
  $borrowed='none';
  $returned='none';
  $hbackground_color= '--select-bg-color'; 
  $bbackground_color= '';
 }
 if(isset($_POST['bbtn'])){
  $history='none';
  $borrowed='block';
  $returned='none';
  $bbackground_color= '--select-bg-color';
 }
 if(isset($_POST['rbtn'])){
  $history='none';
  $borrowed='none';
  $returned='block';
  $rbackground_color= '--select-bg-color';
  $bbackground_color= '';
 }
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile E-lib</title>
    <?php
    include ("../components/logo.php");
    ?>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/data.css">
<style>
    /* .broadcast{
        display: none;
    } */
</style>
</head>
<body onload="onload()"id="body">
<?php
 include ("../components/header.php");
 ?>

<div class="content">

 <div class="coverpic">
     
  </div>
  <div class="profiledata" style="z-index: 1;">

    <div class="info">
        <div class="profilepic">
          <div class="picholder">
          <img <?php include ("../Query/select_pp.php");?> />
          </div>
       </div>
       <div class="name">
         <?php  
         if(isset($_SESSION['Email'])){ 
             echo $_SESSION['User_Name'];
          }else{ ?>
             <a>Guest Account</a>
          <?PHP } ?>
       </div>
       <div class="Email" style="color: gray;">
       <?php  
       if(isset($_SESSION['Email'])){ 
             echo $_SESSION['Email'];
        }
        ?>
       </div>
    </div>
 
  </div>
  <hr>

  <div class="profilebody">
    <div class="profilenav">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="pnavitem" method="post">
        <input type="submit" value="History" name="hbtn" style="background-color: var(<?= $hbackground_color?>);">
        <input type="submit" value="Borrowed Books" name="bbtn" style="background-color: var(<?= $bbackground_color?>);">
        <input type="submit" value="Returned Books" name="rbtn" style="background-color: var(<?= $rbackground_color?>);">
      </form>
    </div>
    <hr>
    <div class="course">
   <div> 

    <div class="contain" style="display:<?= $history?>;">
      <div class="bitem">
        <?php
        include('../components/History.php');
        ?>
      </div>  
    </div>

    <div class="contain" style="display:<?= $borrowed?>; ">
      <div class="bitem">
        <?php
        include('../components/Borrowed.php');
        ?>
      </div>  
    </div>

    <div class="contain" style="display:<?= $returned?>;">
      <div class="bitem">
        <?php
        include('../components/Returned.php');
        ?>
      </div>  
    </div>
    </div>
    </div>
  </div>
</div>  


</body>
</html>