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
    <link rel="stylesheet" href="../css/about.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/content.css"> 
</head>
<body onload="onload()"id="body">
<?php
 include ("../components/header.php");
 ?>
<div class=content>     
    <div class="title">About the project</div>
      <div class="container">
          <span style=" display: flex;    color: var(--text-color);">
            E-Library System is an exceptional online platform that provides an  ability for users to perform own data entry.
            With user-friendly interface,users can effortlessly enter and update book collection, ensuring that library remains up-to-date and accurate.
          </span>
        <br>
         
           <div class="h3">Services</div>
           <ul class="ul">
             <li>Effortlessly Reservation of Books</li>
             <li>Integrity</li>
             <li>Collaboration</li>
             <li>Innovation</li>
             <li>Diversity and inclusion</li>
           </ul>
        <br>
           <div class="h3" >Contact Us</div>
           <ul class="ul">
             <li>E-library</li>
             <li>Email: elib@gmail.com</li>
             <li>Phone:9817246078</li>
           </ul>
        <br>
           <div class="h3">Hours of Operation</div>
           <ul class="ul">
             <li>Sunday- Thursday: 8am - 9pm</li>
             <li>Friday - Saturday: 8am - 5pm</li>
           </ul>
        <br>
           <div class="h3">Location</div>
           <ul class="ul">
             <li>Narayani Model Secondary School,Chitwan</li>
             <li>Macchapuchrey Block, Top-floor, Left-side</li>
           </ul>
    </div>    

</div> 
</body>
</html>