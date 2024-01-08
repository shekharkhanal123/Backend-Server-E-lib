<?php
 session_start(); 
 if(isset($_POST['rbtn'])){
  include('../Query/Get_Checked_Value.php');

  $query = "DELETE FROM publication WHERE Id IN($column)";
  $ans= mysqli_query($con, $query);
  if($ans == true){
    $_SESSION['mess'] = "Data Removed Sucessfully";
  }
  else{
    $_SESSION['err'] = "Data Remove Failed";
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
<body  onload="onload()"id="body">
<?php
 include ("../components/adminheader.php");
 ?>

<div class=content>
<div class="title">Dashboard</div>

<div class="course">
  <div>     
  <span class="class">Publications</span>
  <div class="bitem">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table class="table" border="1" cellspacing="0"  align="center">
    <thead align="center">
      <tr class="thead">
        <th style="padding: 5px 5vw;">Publication</th>
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

      //  read  data from database table
       $query="SELECT * FROM publication";
       $ans=mysqli_query($conn,$query);

       if(!$ans){
        die("Invalid Query: ". $conn->error);
       }

       //read data from each row
       if(mysqli_num_rows($ans) > 0){
        foreach($ans as $row){
            ?>
            <tr class='tdata'>
                <td><?=$row["Publication"];?></td>
                <td><a><input type='checkbox' name='row-check[]' value='<?= $row['Id']?>' ></a></td>
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
      ?>
    </tbody>
    </table> 
    <div class="query">
      <div><input style=" padding: 7px;" type="submit" value="Remove" class="querybtn" name="rbtn"/></div>
    </div>
  </form>
  </div>  
  </div>
</div>

</div>  
</body>
</html>