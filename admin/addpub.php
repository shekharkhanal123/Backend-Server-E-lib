<?php
 session_start(); 
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{  
 
      $publication=test_input($_POST['pub']); 
      $conn=mysqli_connect("localhost","root","","library");
      if(empty($publication)){
                
         $_SESSION['war'] = "Every filled is Requierd !";

      }else{
          $querys="SELECT * FROM publication";
          $test=mysqli_query($conn,$querys);
          
            while($row= mysqli_fetch_assoc($test))
            {
              if($row['Publication']==$publication)
              {
                    $_SESSION['war'] = "Publication Already Exist !";
              }
              else{
                 $query="INSERT INTO publication(Publication)VALUES('$publication')";
                 $ans=mysqli_query($conn,$query);
                  if($ans == true){
                     $_SESSION['mess'] = "Publication Added Successfully !";
                   }
              }
            }
            if(mysqli_num_rows($test) == 0){
            $query="INSERT INTO publication(Publication)VALUES('$publication')";
            $ans=mysqli_query($conn,$query);
             if($ans == true){
                $_SESSION['mess'] = "Publication Added Successfully !";
              }
            }
      }
}
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> E-lib</title>
    <?php
     include ("../components/logo.php");
     ?>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/content.css">
    <link rel="stylesheet" href="../css/data.css">
<style>
  #pubbtn{
        background-color: var(--select-bg-color);
        border-top:  1px solid var(--select-border-color);
        border-bottom:  1px solid var(--select-border-color);
        transition: 0.5s;
  }
   .p{
    display: flex;
    padding: 10px 52% 10px 45px;
     }
 
</style> 
</head>
<body  onload="onload()"id="body">
<?php
 include ("../components/adminheader.php");
 ?>
<div class=content >
      <div class="title">Add Publication</div>
      <div class="container">
         
        <div class="fbody">
       
          <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <div class="file">
                <div as="ul" class="data">
                      <li class="name">Publication:</li>
                      <li class="value"><input type="text" name="pub" /></li>
                </div>
            
                <div style="display: flex;justify-content: end;"><input type="submit" value="Submit" class="querybtn" name="sbtn"/></div>
          </div>
          </form>
        </div>
      </div>
</div>  
</body>
</html>