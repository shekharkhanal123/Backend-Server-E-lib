<?php
 session_start();
 if(isset($_POST['rbtn'])){
    include('../Query/Get_Checked_Value.php');
    if(!empty($column))
      {  
    $conn = mysqli_connect("localhost","root","","library");
    $query = "SELECT * FROM book_requests WHERE Id IN($column)";
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
  
        include('../Query/Borrowing_Process.php');
       
        
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
<body  onload="onload()"id="body">
<?php
 include ("../components/adminheader.php");
 ?>

<div class=content>
<div class="title">Borrowed Books</div>

 <div class="container">
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

              <th>User_Name</th>
              <th>Faculty</th>
              <th>Sem/class</th>
              <th>Books </th>
              <th>Publication</th>
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
         $query="SELECT * FROM book_requests WHERE User_Name='$name'";
         $ans=mysqli_query($conn,$query);
         include("../Query/Get_Data_From_Book_Requests.php");
         }
         elseif(empty($name))
         {
            //  read  data from database table
            $query="SELECT * FROM book_requests";
            $ans=mysqli_query($conn,$query);
     
            if(!$ans){
             die("Invalid Query: ". $conn->error);
            }
     
            //read data from each row
            include("../Query/Get_Data_From_Book_Requests.php");
          }
        
       }
       else
       {
          //  read  data from database table
          $query="SELECT * FROM book_requests";
          $ans=mysqli_query($conn,$query);
          if(!$ans){
           die("Invalid Query: ". $conn->error);
          }
          //read data from each row
          include("../Query/Get_Data_From_Book_Requests.php");
           
         }
      ?>
    </tbody>
    </table> 
    <div class="query">
      <div><input style=" padding: 7px;" type="submit" value="Given" class="querybtn" name="rbtn"/></div>
    </div>
  </form>
  </div>  
  </div>
   </div>
  </div>
</div>  
</body>
</html>