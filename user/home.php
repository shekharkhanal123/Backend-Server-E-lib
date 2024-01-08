<?php
 session_start(); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E lib</title>
    <?php
    include ("../components/logo.php");
    ?>
    <!-- <link rel="stylesheet" href="../css/about.css"> -->
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/content.css">
    <script src="../js/theme.js"></script>
<style>
  #homebtn{
        background-color: var(--select-bg-color);
        border-top:  1px solid var(--select-border-color);
        border-bottom:  1px solid var(--select-border-color);
        transition: 0.5s;
  }
  .h{
      display: flex;
      color:#fff;
      padding: 10px 57% 10px 45px;
     }
    .i{
      color:#fff;
    }
</style>  
</head>
<body onload="onload()" id="body">
<?php
 include ("../components/header.php");
 ?>
   
<div class="body" style="position:relative;">

 <div class=content>
       <div class="title">Books We Provide</div>
       <div class="container">
         <div as="ul" class="item">
         <!-- <li class="box">
           <div class="topic">
              <a>Class (1-10)</a>
           </div>
           <div class="type">
             <a href="class.php">See Books</a>
           </div>
         </li> -->
         <li class="box">
           <div class="topic">
              <a>Diploma</a>
           </div>
           <div class="type">
             <a href="diploma.php">See Books</a>
           </div>
         </li>
         <li class="box">
           <div class="topic">
              <a>+2 Science</a>
           </div>
           <div class="type">
             <a href="+2science.php">See Books</a>
           </div>
         </li>
         <li class="box">
           <div class="topic">
              <a>+2 Management</a>
           </div>
           <div class="type">
             <a href="+2management.php">See Books</a>
           </div>
         </li>
         
         </div>
       </div>
   </div>
   
</div>



</body>
</html>