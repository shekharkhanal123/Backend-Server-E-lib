<?php
 session_start(); 
 if(isset($_POST['rbtn'])){
  include('../Query/Get_Checked_Value.php');
  if(!empty($column))
  {  
  $conn = mysqli_connect("localhost","root","","library");
  $query = "SELECT * FROM borrowed_books WHERE Id IN($column)";
  $ans= mysqli_query($conn, $query);
  if($ans == true)
  {
    foreach($ans as $row)
    {   
      $name= $row["User_Name"];
      $class= $row["Sem_Class"];
      $books= $row['Books'];
      $faculty= $row["Faculty"];
      $publication=$row['Publication'];
      $borrowed=$row['Borrowed_Date'];
      include('../Query/User_History.php');
      include('../Query/Returned_Books.php');
    }
  }
  else{
    $_SESSION['err'] = "Processor Failed";
  }
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

<div class=content >
<div class="title">Borrowed Books</div>

 <div class="container">
   <div class="course">
  <div>    
  <div class="bitem">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="search_bar">
        <input style="width: fit-content;margin: 10px;" type="text" placeholder="-User Name-" name="name"/>
        <input style="margin: 10px 0px;" type="submit" value="Search" class="querybtn" name="sbtn"/>
  </div>
    <table class="table" border="1" cellspacing="0"  align="center">
    <thead align="center">
    <tr class="thead">

              <th>User_Name</th>
              <th>Faculty</th>
              <th>Sem/class</th>
              <th>Books </th>
              <th>Publication</th>
              <th>Borrowed Date</th>
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
         $name=$_POST['name'];
         if(!empty($name)){
         $query="SELECT * FROM borrowed_books WHERE User_Name='$name'";
         $ans=mysqli_query($conn,$query);
         //read data from each row
       if(mysqli_num_rows($ans) > 0)
       {
          foreach($ans as $row){
              ?>
              <tr class='tdata'>
                  <td class='bname'><?=$row["User_Name"];?></td>
                  <td><?=$row["Faculty"];?></td>
                  <td><?=$row["Sem_Class"];?></td>
                  <td ><?=$row["Books"];?></td>
                  <td><?=$row["Publication"];?></td>
                  <td><?=$row["Borrowed_Date"];?></td>
                  <td><a><input type='checkbox' name='row-check[]' value='<?= $row['Id']?>' ></a></td>
              </tr>
              <?php
          }
    
        }
        else
        {
            ?>
            <tr class='tdata'>
               <td colspan="7"> No Record Found</td>
            </tr>
            <?php
        }
         }
         elseif(empty($name))
         {
            //  read  data from database table
            $query="SELECT * FROM borrowed_books";
            $ans=mysqli_query($conn,$query);
     
            if(!$ans){
             die("Invalid Query: ". $conn->error);
            }
     
            //read data from each row
            //read data from each row
          if(mysqli_num_rows($ans) > 0)
          {
           foreach($ans as $row)
           {
              ?>
              <tr class='tdata'>
                  <td class='bname'><?=$row["User_Name"];?></td>
                  <td><?=$row["Faculty"];?></td>
                  <td><?=$row["Sem_Class"];?></td>
                  <td ><?=$row["Books"];?></td>
                  <td><?=$row["Publication"];?></td>
                  <td><?=$row["Borrowed_Date"];?></td>
                  <td><a><input type='checkbox' name='row-check[]' value='<?= $row['Id']?>' ></a></td>
              </tr>
              <?php
            }
    
          }
          else
          {
              ?>
              <tr class='tdata'>
                 <td colspan="7"> No Record Found</td>
              </tr>
              <?php
          }
          }
        
       }
       else
       {
          //  read  data from database table
          $query="SELECT * FROM borrowed_books";
          $ans=mysqli_query($conn,$query);
          if(!$ans){
           die("Invalid Query: ". $conn->error);
          }
          //read data from each row
          //read data from each row
       if(mysqli_num_rows($ans) > 0)
       {
          foreach($ans as $row){
              ?>
              <tr class='tdata'>
                  <td class='bname'><?=$row["User_Name"];?></td>
                  <td><?=$row["Faculty"];?></td>
                  <td><?=$row["Sem_Class"];?></td>
                  <td ><?=$row["Books"];?></td>
                  <td><?=$row["Publication"];?></td>
                  <td><?=$row["Borrowed_Date"];?></td>
                  <td><a><input type='checkbox' name='row-check[]' value='<?= $row['Id']?>' ></a></td>
              </tr>
              <?php
          }
    
        }
        else
        {
            ?>
            <tr class='tdata'>
               <td colspan="7"> No Record Found</td>
            </tr>
            <?php
        }
           
         }
       

       
      ?>
    </tbody>
    </table> 
    <div class="query">
      <div><input style=" padding: 7px;" type="submit" value="Returned" class="querybtn" name="rbtn"/></div>
    </div>
  </form>
  </div>  
  </div>
   </div>
  </div>
</div>  
</body>
</html>