<?php
 session_start(); 
 if(isset($_POST['rbtn'])){

  include('../Query/Get_Checked_Value.php');

  if(!empty($column))
  {  
      $query = "DELETE FROM diploma WHERE Id IN($column)";
      $ans= mysqli_query($con, $query);
      if($ans == true){
        $_SESSION['mess'] = "Data Removed Sucessfully";
      }
      else{
        $_SESSION['err'] = "Data Remove Failed";
      }
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
      padding: 10px 57% 10px 45px;
     }
</style> 
</head>
<body  onload="onload()"id="body">
<?php
 include ("../components/adminheader.php");
 ?>
<div class="body" style="position:relative;">

<div class=content>
   
    <div class="title">Diploma</div>
    <div class="course">
    <div>
    <div class=content style="
    top: 61px;">
    <div class="bitem">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class="datatable" border="1" cellspacing="0"  align="center">
    <thead align="center">
      <tr class="thead">
        <th>Semeter<input style="width: 40px; margin-left: 10px;" type="number" placeholder="-lvl-" name="class"/> </th>
        <th>Book </th>
        <th>Publication </th>
        <th>Quantity </th>
        <th>Select </th>
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
    <div class="query">
      <div ><input style=" padding: 7px;" type="submit" value="Submit" class="querybtn" name="sbtn"/></div>
      <div ><input style=" padding: 7px;" type="submit" value="Remove" class="querybtn" name="rbtn"/></div>
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