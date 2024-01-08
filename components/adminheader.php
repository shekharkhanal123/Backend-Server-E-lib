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
<div id="nav">
  <nav class=nav> 
    <div class="front">
      <a id="mbtn" onclick="nav()"><div><i id="i" class="fa-solid fa-bars"></i></div></a> 
      <a href="dashboard.php" ><img src="../img/lightlogo.png" class="logo2"></a>
    </div>
  </nav>
  <nav id="sidenav">
        <div class="navbar"> 
        <div class="profile">
          <div class="close">
          <a  onclick="nav()"><i id="i" class="fa-solid fa-bars" style="color:#ffffff;"></i></a> 
          </div>
          <div style="display:flex;">
            <div class="pimg" >
            <a><img  src="../Uploads/d0tb7.jpg" style="border-radius:100%;border:2px solid #57ABFF;height: 35px;  width: 35px;"></a> 
            </div>
            <button  class="pp" onclick="toggleMenu()">
               <div class="pname">
                 <?php 
                  echo $_SESSION['admin_email'];
                  ?>
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
                  <li><a href="logout.php" style="border-radius: 10.5px;" ><i id="ri" class="fa-solid fa-arrow-right-from-bracket fa-rotate-180"></i><div class="lable">Logout</div></a></li>
                </ul>
              </div>
            </div>
      </div>
      <div>
        <ul class="hul">
          <li id="homebtn"><a class="h" href="dashboard.php" ><i class="fa-solid fa-house" id="i"></i>Dashboard</a></li>
          <li id="booksbtn"><a  class="b" href="addbook.php" ><i class="fa-solid fa-book" id="i"></i>Add Book</a></li>
          <li id="pubbtn"><a  class="p" href="addpub.php" ><i class="fa-solid fa-user" id="i"></i>Add Publication</a></li>
        </ul>
      </div>
      <div class="navaboutborder">
      <div style=" padding: 20px 10px;">
      <div class="width">
        <div  class="width">
        <div as="ul" class="navabouttop">
          <div><li><a href="../admin/account.php">Settings</a></li></div>
          <div>
           <li class="themecontent">
              <div class="themeoption" id="themeopen">
                <div  ><a class="themeline" style="border-radius: 5.5px 5.5px  5.5px 5.5px;" href="#"><i id="i" style=" padding-right: 9px; " class="fa-solid fa-moon"></i><div style="display: flex;justify-content: space-between;width: -webkit-fill-available;"><div>Dark Theme</div> <div style="width: max-content;display: flex;"> <div id="checkdark" onclick="darkmode()"><i class="indicator"></i></div><label for="check" class="checkdark"></label></div></div></a></div>
                <!-- <div ><a class="themeline" style="border-radius: 0px 0px 5.5px 5.5px ;" href="#" ><i id="i"  style=" padding-right: 7px; " class="fa-solid fa-sun"></i><div>Light Theme</div></a></div> -->
              </div>
              <hr>
              <div class="theme" onclick="opentheme()"><a>Theme </a><i id="i" class="fa-solid fa-angle-up" style="padding-right:2px;"></i></div>
            </li>
          </div>
        </div>
        </div>
        <div class="width">
        <div class="navaboutbottom">
        <a  class="l" href="logout.php"><i id="ri" class="fa-solid fa-arrow-right-from-bracket fa-rotate-180"></i><div  style="margin-left: 5px;">Logout</div></a>
        </div>
        </div>
      </div>
      </div>
        </div>
  </nav>
  <?php
    include('../Query/Get_Message.php');
  ?>
   <!-- js CODE FOR ALL -->
  <script>
    //let subMenu= document.getElementById("subMenu");
    function toggleMenu(){
      subMenu.classList.toggle("open-menu");
    }
  </script>
  <script>
  //  let sidenav = document.getElementById("sidenav")
          
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
