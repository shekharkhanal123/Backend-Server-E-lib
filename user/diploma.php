<?php
 session_start(); 
 
if(isset($_POST['reserve']))
{

  if(isset($_SESSION['Email']))
  {
    
      $conn = mysqli_connect("localhost","root","","library");

      include('../Query/Get_Checked_Value.php');
      
      if(!empty($column))
      {  
        // foreach ( $Id as $column)   //for mulltiple reserrvation
        // {
          $query="SELECT * FROM diploma WHERE  Id IN($column) ";
          $ans=mysqli_query($conn,$query);
          if($ans == true)
          {
            $_SESSION['faculty'] = "Diploma";
            foreach($ans as $row)
            {   
              $name= $_SESSION['User_Name'];
              $class= $row['Semester'];
              $books= $row['Books'];
              $faculty= $_SESSION['faculty'];
              $publication=$row['Publication'];
              include('../Query/Reservation_Process.php');
            }
          }
 
        // }
        
      }
  }
  else{
     $_SESSION['war'] = "You have to login First !";
  }
 
}
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
    <link rel="stylesheet" href="../css/content.css">
    <link rel="stylesheet" href="../css/data.css">
    <style>
       /* Chrome, Safari, Edge, Opera */
       input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }
      
      /* Firefox */
      input[type=number] {
        -moz-appearance: textfield;
      }
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
  
    <div class="title">Diploma</div>
    <div class="course">
    <div>
    <div class="container">
    <div class="bitem">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class="datatable" border="1" cellspacing="0"  align="center">
    <thead align="center">
      <tr class="thead">
        <th style="padding: 5px 6px;">Semeter<input style="width: 40px; margin-left: 10px;" type="number" placeholder="-lvl-" name="class"/> </th>
        <th style="padding: 5px 10vw;">Book </th>
        <th style="padding: 5px 6vw;">Publication </th>
        <th style="padding: 5px 5vw;">Status </th>
        <th style="padding: 5px 10px;">Select </th>
      </tr>
    </thead>
    <tbody align="center">  
    <?php 
      $conn=mysqli_connect("localhost","root","","library");
       //check connection
       if($conn->connect_error){
        die("connection failed: ". $conn->connect_error);
       }
      if(isset($_POST["sbtn"]))
      { 
        $class=$_POST['class'];
        if(!empty($class)){
        $query="SELECT * FROM diploma WHERE Semester='$class'";
        $ans=mysqli_query($conn,$query);
        include("../Query/Get_Data_From_Sem.php");
        }
        elseif(empty($class)){
      
      //  read  data from database table
       $query="SELECT * FROM diploma ";
       $ans=mysqli_query($conn,$query);

       if(!$ans){
        die("Invalid Query: ". $conn->error);
       }

       //read data from each row
       include("../Query/Get_Data_From_Sem.php");
        }
       
      }
      else{

       
       //check connection
       if($conn->connect_error){
        die("connection failed: ". $conn->connect_error);
       }

      //  read  data from database table
       $query="SELECT * FROM diploma ";
       $ans=mysqli_query($conn,$query);

       if(!$ans){
        die("Invalid Query: ". $conn->error);
       }

       //read data from each row
       include("../Query/Get_Data_From_Sem.php");
       }
      ?>
    </tbody>
    </table> 
    <div class="width">
    <div class="query">
      <div class="fit"><input style=" padding: 7px;" type="submit" value="Submit" class="querybtn" name="sbtn"/></div>
      <div class="fit"><input type="submit" value="Reserve" class="querybtn" name="reserve"/></div>
    </div>
    </div>
    </form>
    </div>   
    </div>
    </div>
    </div>
</div>
</div>
</body>
</html>
