<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Books E-lib</title>
    <?php
    include ("../components/logo.php");
    ?>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/books.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
<style>
  #booksbtn{
        background-color: var(--select-bg-color);
        border-top:  1px solid var(--select-border-color);
        border-bottom:  1px solid var(--select-border-color);
        transition: 0.5s;
  }
  .b{
    display: flex;
    padding: 10px 57% 10px 45px;
    color:#fff;
     }
    .i{
      
    }
</style>  
</head>
<body onload="onload()"id="body">
<?php
 include ("../components/header.php");
 ?>
<div class=content>
Under Development Process !

</div> 
</body>
</html>