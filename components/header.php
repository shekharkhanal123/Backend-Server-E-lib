<!-- <?php
 //session_start(); 
 ?> -->
<script src="https://kit.fontawesome.com/1d4a572c22.js" crossorigin="anonymous"></script>
<link rel="icon" href="img/3miz7y29.png" type="image/x-icon">
<link rel="stylesheet" href="../css/header.css">
<!-- for icons -->
<link rel="stylesheet" href="../icon-css/all.min.css">
<link rel="stylesheet" href="../icon-css/fontawesome.min.css">
<script src="../js/theme.js"></script>
 <style>
  .sub-title{
      margin: 0px 10px;
      border-radius: 5px;
      border-top: 0px;
      border: 2px solid var(--nav-border-color);
  }
 </style>





  <!-- FOR USER PAGE -->



<div id="nav">
 <nav class=nav> 
     <div class="front">
       <a id="mbtn" onclick="nav()"><div><i id="i" class="fa-solid fa-bars"></i></div></a> 
       <a href="home.php" ><img src="../img/lightlogo.png" class="logo2"></a>
     </div>
     <?php
       if(isset($_SESSION['Email'])){   
      ?>
      <div >
       <a href="profile.php"><img <?php include ("../Query/select_pp.php");?> style="display: flex; border-radius:100%;border:2px solid #57ABFF;height: 35px;  width: 35px; margin-right: 10px;"></a> 
      </div>
     <?PHP
       }else{ 
     ?>
     <div class="side">
       <div class="down" style="padding-right: 60px;">
         <a class="btnsign" href="../signup.php">Signup</a>
       </div>
       <div class="up">
         <a class="btnlog" href="../index.php">Login</a> 
       </div>
     </div>
     <?php 
       }
     ?>
 </nav>
 
 
 <nav id="sidenav">
       <div class="navbar"> 
         <div class="profile">
           <div class="close">
           <a  onclick="nav()"><i id="i" class="fa-solid fa-bars" style="color:#ffffff;"></i></a> 
           </div>
           <div style="display:flex;">
           <?php
            if(isset($_SESSION['Email'])){   
           ?>
            <div class="pimg" >
             <a href="profile.php"><img  <?php include ("../Query/select_pp.php");?> style="border-radius:100%;border:2px solid #57ABFF;height: 35px;  width: 35px;"></a> 
            </div>
           <?PHP
            }else{ 
            ?>
            <div class="pimg" >
             <a><img  src="../Uploads/d0tb7.jpg" style="border-radius:100%;border:2px solid #57ABFF;height: 35px;  width: 35px;"></a> 
            </div>
            <?php
            }
            ?>
             
             <button  class="pp" onclick="toggleMenu()">
                <div class="pname">
                 <?php  if(isset($_SESSION['Email'])){ 
                   echo $_SESSION['User_Name'];
                   }
                   else{ ?>
                   <a>Guest Account</a>
                 <?PHP } ?>
                </div>
                <div>
                   <i id="i" class="fa-solid fa-angle-down" style="padding-right:2px;"></i>
                </div>
             </button>
            </div> 
          </div>
          <div class="subprofile" id="subMenu" style="margin-left: 50%;">
               <div class="subprofileitem" >
                 <ul>
                   <li><a style="border-radius: 10.5px 10.5px 0px 0px;" href="profile.php"><i id="i" class="fa-solid fa-user"></i><div class="lable">Profile</div></a></li>
                   <?php  if(isset($_SESSION['Email'])){ ?>
                   <li><a style="border-radius: 0px 0px 10.5px 10.5px;"  href="logout.php"><i id="ri" class="fa-solid fa-arrow-right-from-bracket fa-rotate-180"></i><div class="lable">Logout</div></a></li>
                   <?PHP }else{ ?>
                   <li><a style="border-radius: 0px 0px 10.5px 10.5px;"  href="../login.php"><i id="i" class="fa-solid fa-arrow-right-to-bracket"></i><div class="lable">Login</div></a></li>
                   <?PHP } ?>
                 </ul>
               </div>
             </div>
       </div>
       <div>
         <ul class="hul">
           <li id="homebtn"><a class="h" href="home.php" ><i class="fa-solid fa-house" id="i"></i>Home</a></li>
           <!-- <li id="booksbtn"><a  class="b" href="books.php" ><i class="fa-solid fa-book" id="i"></i>Books</a></li> -->
           <!-- <li id="aboutbtn"><a  class="a" href="about.php"><i class="fa-solid fa-bookmark" id="i"></i>About</a></li> -->
           <!-- <li id="settingbtn"><a class="s" href="setting.php" ><i class="fa-solid fa-gear" id="i"></i>Settings</a></li> -->
         </ul>
       </div>
       
       <div class="navaboutborder">
       <div style=" padding: 10px;">
       <div class="width">
         <div  class="width">
         <div as="ul" class="navabouttop">
             <?php  if(isset($_SESSION['Email'])){ ?>
             <div><li><a href="../user/about.php">About</a></li></div>
             <div><li><a href="../user/setting.php">Settings</a></li></div>
             <?PHP }else{ ?>
             <div><li><a href="../user/about.php">About</a></li></div>
             <?PHP } ?>
          
           <div>
            <li class="themecontent">
               <div class="themeoption" id="themeopen">
                 <div  ><a class="themeline" style="border-radius: 5.5px 5.5px  5.5px 5.5px;" href="#"><i id="i" style=" padding-right: 9px; " class="fa-solid fa-moon"></i><div style="display: flex;justify-content: space-between;width: -webkit-fill-available;"><div>Dark Theme</div> <div style="width: max-content;display: flex;"> <div id="checkdark" onclick="darkmode()"><i class="indicator"></i></div><label for="check" class="checkdark"></label></div></div></a></div>
                 <!-- <div ><a class="themeline" style="border-radius: 0px 0px 5.5px 5.5px ;" href="#" ><i id="i"  style=" padding-right: 7px; " class="fa-solid fa-sun"></i><div>Light Theme</div></a></div> -->
               </div>
               <hr>
               <div class="theme" onclick="opentheme()"><a>Theme  </a><i id="i" class="fa-solid fa-angle-up" style="padding-right:2px;"></i></div>
             </li>
           </div>
         </div>
         </div>
         
         <?php  if(isset($_SESSION['Email'])){ ?> 
         <div class="width">
         <div class="navaboutbottom">
         <a  class="l" href="logout.php"><i id="ir" class="fa-solid fa-arrow-right-from-bracket fa-rotate-180"></i><div id="ri">Logout</div></a>
         </div>
         </div>
         <?PHP }else{} ?>
       </div>
       </div>
       </div>
 </nav>
 <marquee class="broadcast"> | Welcome to E-lib | Timing: 10 AM TO 4 PM on WORKING DAYS  | Contact: +977 981-7246078 , +977 986-6115981 |</marquee>
 <?php
  include('../Query/Get_Message.php');
 ?>
 <!-- js CODE FOR ALL -->
 <script>
   // let subMenu= document.getElementById("subMenu");
   function toggleMenu(){
     subMenu.classList.toggle("open-menu");
   }
 </script>
 <script>
   //let sidenav = document.getElementById("sidenav")
         
   function nav(){
     sidenav.classList.toggle("open-nav");
     body.classList.toggle("close-body");
   }
 </script>
 <script>
   // let themeopen= document.getElementById("themeopen");
   function opentheme(){
     themeopen.classList.toggle("open-theme");
   }
 </script>
</div>
