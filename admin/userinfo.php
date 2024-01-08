<?php
 session_start(); 
 if(isset($_POST['rbtn'])){
  include('../Query/Get_Checked_Value.php');
  if(isset($column)){

    $conn = mysqli_connect("localhost","root","","library");
    $query = "SELECT * FROM members WHERE Id IN($column)";
    $ans= mysqli_query($conn, $query);
    if($ans == true)
    {
      foreach($ans as $row)
      {   
        $name= $row["User_Name"];
        $email= $row["Email"];
        $address= $row['Place'];
        $phone= $row["Phone"];
        include('../Query/passeduserchg.php');
        
      }
    }
    else{
      $_SESSION['err'] = "Processor Failed";
    }
   


    $query = "DELETE FROM members WHERE Id IN($column)";
    $ans= mysqli_query($con, $query);
    if($ans == true){
      
      $_SESSION['mess'] = "User Removed Sucessfully";
      $_SESSION['remove']= true;
    }
    else{
      $_SESSION['err'] = "User Remove Failed";
    }



  }else{
    $_SESSION['err'] = "Select First!";
  }
  
}
?>



 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0">
    <title>Users E-lib</title>
    <?php
     include ("../components/logo.php");
     ?>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/table.css">
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
 
<div class=content>
<div class="title">Dashboard</div>

<div class="course">
  <div>    
  <div class="bitem">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <!-- search bar -->
  <div class="search_bar">
    <input style="width: fit-content;margin: 10px;" type="text" placeholder="-User Name-" name="name"/>
    <input style="margin: 10px 0px;" type="submit" value="Search" class="querybtn" name="sbtn"/>
  </div>
   <!-- search bar close -->
    <table class="table" border="1" cellspacing="0"  align="center">
    <thead align="center">
      <tr class="thead">
        <th>User Name </th>
        <th>Email </th>
        <th>Adress</th>
        <th>Phone</th>
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
        // searching user name 
       if(isset($_POST["sbtn"]))
       { 
         $name=$_POST['name'];
         if(!empty($name))
         {
           $query="SELECT * FROM members WHERE User_Name='$name'";
           $ans=mysqli_query($conn,$query);

            //read data from each row
             if(mysqli_num_rows($ans) > 0)
             {
               foreach($ans as $row)
               {
                 ?>
                 <tr class='tdata'>
                     <td class='bname'><?=$row["User_Name"];?></td>
                     <td><?=$row["Email"];?></td>
                     <td><?=$row["Place"];?></td>
                     <td><?=$row["Phone"];?></td>
                     <td><a><input type='checkbox' name='row-check[]' value='<?= $row['Id']?>'></a></td>
                 </tr>
                 <?php
               }
              }
              else
              {
                ?>
                <tr class='tdata'>
                   <td colspan="5"> No Record Found</td>
                </tr>
                <?php
              }
          }
        }
        //  when not searched any name
        elseif(empty($name))
        {
          //  read  data from database table
          $query="SELECT * FROM members";
          $ans=mysqli_query($conn,$query);
    
          if(!$ans){
           die("Invalid Query: ". $conn->error);
          }
    
          //read data from each row
          if(mysqli_num_rows($ans) > 0)
          {
           foreach($ans as $row){
               ?>
               <tr class='tdata'>
                   <td class='bname'><?=$row["User_Name"];?></td>
                   <td><?=$row["Email"];?></td>
                   <td><?=$row["Place"];?></td>
                   <td><?=$row["Phone"];?></td>
                   <td><a><input type='checkbox' name='row-check[]' value='<?= $row['Id']?>'></a></td>
               </tr>
               <?php
             }
          }else{
              ?>
              <tr class='tdata'>
                 <td colspan="5"> No Record Found</td>
              </tr>
              <?php
          }
        }
        else
        {

          //  read  data from database table
          $query="SELECT * FROM members";
          $ans=mysqli_query($conn,$query);

          if(!$ans){
           die("Invalid Query: ". $conn->error);
          }

          //read data from each row
          if(mysqli_num_rows($ans) > 0){
           foreach($ans as $row){
               ?>
               <tr class='tdata'>
                   <td class='bname'><?=$row["User_Name"];?></td>
                   <td><?=$row["Email"];?></td>
                   <td><?=$row["Place"];?></td>
                   <td><?=$row["Phone"];?></td>
                   <td><a><input type='checkbox' name='row-check[]' value='<?= $row['Id']?>'></a></td>
               </tr>
               <?php
            }
       
           }else{
               ?>
               <tr class='tdata'>
                  <td colspan="5"> No Record Found</td>
               </tr>
               <?php
           }

        }
      ?>
    </tbody>
    </table> 
    <div class="query">
      <!-- <div><a class="querybtn" href="reserve.php">See Info</a></div> -->
      <div><input style=" padding: 7px;" type="submit" value="Remove" class="querybtn" name="rbtn"/></div>
    </div>
  </form>
  </div>  
  </div>
</div>

</div>  
</body>
</html>