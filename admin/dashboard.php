
<?php
 session_start();
if (!isset($_SESSION['admin_email'])) {
    header('Location: ../adminlogin.php');
 }
 else{
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
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/content.css">
    <link rel="stylesheet" href="../css/data.css">
<style>
  #homebtn{
        background-color: var(--select-bg-color);
        border-top:  1px solid var(--select-border-color);
        border-bottom:  1px solid var(--select-border-color);
        transition: 0.5s;
  }
  .h{
      display: flex;
      padding: 10px 57% 10px 45px;
     }
</style>  
</head>
<body  onload="onload()" id="body">
<?php
 include ("../components/adminheader.php");
 ?>
   
<div class="body" style="position:relative;">
     <div class=content>
    <div class="title">Dashboard</div>
    
    <div class="container">
      <div as="ul" class="item">
      <li class="box">
        <div class="topic">
           <a>Total User </a>
        </div>
        <div class="type">
          <a href="userinfo.php">See User</a>
        </div>
      </li>

      <li class="box">
        <div class="topic">
           <a>Passed Out User</a>
        </div>
        <div class="type">
          <a href="passeduser.php">See past info</a>
        </div>
      </li>

      <li class="box">
        <div class="topic">
           <a>Total Publication</a>
        </div>
        <div class="type">
          <a href="publication.php">See Publication</a>
        </div>
      </li>

      

      <li class="box">
        <div class="topic">
           <a>Book Requests</a>
        </div>
        <div class="type">
          <a href="Book_Request.php">See Requests</a>
        </div>
      </li>
      </div>
    </div>
  </div>

     <div class=content>
    <div class="title">Borrowed Details</div>
    
    <div class="container">
      <div as="ul" class="item">
      <li class="box">
        <div class="topic">
           <a>Borrowed History</a>
        </div>
        <div class="type">
          <a href="Borrowed_history.php">See Details</a>
        </div>
      </li>
      <li class="box">
        <div class="topic">
           <a>Borrowed Books</a>
        </div>
        <div class="type">
          <a href="Borrowed.php">See Details</a>
        </div>
      </li>
      <li class="box">
        <div class="topic">
           <a>Returned Books</a>
        </div>
        <div class="type">
          <a href="Returned.php">See Details</a>
        </div>
      </li>
      </div>
    </div>
  </div>

  <div class=content>
    <div class="title">Books</div>
    <div class="container">
      <div as="ul" class="item">
      <!-- <li class="box">
        <div class="topic">
           <a>Class (1-10)</a>
        </div>
        <div class="type">
          <a href="class.php">Update</a>
        </div>
      </li> --> 
      <li class="box">
        <div class="topic">
           <a>Diploma</a>
        </div>
        <div class="type">
          <a href="diploma.php">Update</a>
        </div>
      </li>
      <li class="box">
        <div class="topic">
           <a>+2 Science</a>
        </div>
        <div class="type">
          <a href="+2science.php">Update</a>
        </div>
      </li>
      <li class="box">
        <div class="topic">
           <a>+2 Management</a>
        </div>
        <div class="type">
          <a href="+2management.php">Update</a>
        </div>
      </li>
     
      </div>
     </div>
  </div>

  

</div>
</body>
</html>
<?php } ?>