<?php
 session_start(); 
 function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
     $mess='';
     $err='';
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {  
      try {
            $table=test_input($_POST['tname']);
            $section= test_input($_POST['section']);
            $class= test_input($_POST['class']);
            $book= test_input($_POST['bname']);
            $publication=test_input($_POST['pub']);
            $quentity=test_input($_POST['quentity']);  
            $conn=mysqli_connect("localhost","root","","library");
            if(empty($table) || empty( $section) || empty($class) || empty( $book) || empty( $publication) || empty($quentity)){
                  
                 $_SESSION['err']='Every field is Requierd';

            }else{
               $querys="SELECT * FROM $table WHERE $section='$class'";
               $test=mysqli_query($conn,$querys);
               while($row= mysqli_fetch_assoc($test))
               {
                     if($row['Books']==$book && $row['Publication']==$publication )
                     {
                           $_SESSION['err'] = 'Book Already Exist !';
                     }
                     else{
                        $query="INSERT INTO $table($section,Books,Publication,Quentity)VALUES('$class','$book','$publication','$quentity')";
                        $ans=mysqli_query($conn,$query);
                         if($ans == true){
                             $_SESSION['mess']='Submision Sucessful';
                          }
                          else{
                             $_SESSION['err'] = 'code error !';
                          }
                       }
               }
               if(mysqli_num_rows($test) == 0){
                   $query="INSERT INTO $table($section,Books,Publication,Quentity)VALUES('$class','$book','$publication','$quentity')";
                   $ans=mysqli_query($conn,$query);
                   if($ans == true){
                        $_SESSION['mess']='Submision Sucessful';
                   }else{
                         $_SESSION['err'] = 'code error !';
                   }
               }
            }
            
      } catch (\Throwable $err) {
          $err='Invalid Detail !';
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

  #booksbtn{
        background-color: var(--select-bg-color);
        border-top:  1px solid var(--select-border-color);
        border-bottom:  1px solid var(--select-border-color);
        transition: 0.5s;
  }
  .b{
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
      <div class="title">Add Books</div>
      <div class="container">
         <div class="fbody">
         
            <!-- form -->
            <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <div class="file">
                  <div as="ul"  class="data">
                        <li class="name">Faculty Name:</li>
                        <li class="value">
                              <select name="tname" class="input">
                                    <option selected></option>  
                                    <option>diploma</option>  
                                    <option>science</option>  
                                    <option>management</option>  
                                </select> 
                        </li>
                  </div>
                  <div as="ul" class="data">
                        <li class="name">Section:</li>
                        <li class="value" style="display: flex;">
                        <select name="section" class="input">
                            <option selected></option>  
                            <option>Semester</option>  
                            <option>Class</option>  
                        </select> 
                        <input style="width: 40px; margin-left: 10px;" type="number" placeholder="-lvl-" name="class"/></li>
                  </div>
                  <div as="ul" class="data">
                        <li class="name">Book Name:</li>
                        <li class="value"><input type="text" name="bname"/></li>
                  </div>
                  <div as="ul" class="data">
                        <li class="name">Publication:</li>
                        <li class="value">
                         <select name="pub" class="input" >
                            <option selected></option>  

                       
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
                            while($row= mysqli_fetch_assoc($ans))
                            {
                             echo "<option>".$row["Publication"]."</option>";
                            }
                          ?>
                         </select> 
                        </li>
                  </div>
                  <div as="ul" class="data">
                        <li class="name">Status:</li>
                        <li class="value">
                              <select name="quentity" class="input" >
                              <option selected></option>
                              <option >Available</option>
                              </select>
                        </li>
                  </div>
              
                  <div style="display: flex;justify-content: end;"><input type="submit" value="Submit" class="querybtn" name="sbtn"/></div>
            </div>
            </form>
            <!-- form close -->

        </div>
      </div>
</div>  
</body>
</html>