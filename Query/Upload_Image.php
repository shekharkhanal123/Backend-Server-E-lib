<?php
  $name=$_SESSION['User_Name'];
  $img_name= uniqid("IMG", true).'.'.$fileExtension;

  $conn = mysqli_connect("localhost","root","","library");
  $qrys="SELECT * FROM image WHERE User_Name='$name'";
  $namecheck=mysqli_query($conn,$qrys);

  if(mysqli_num_rows($namecheck)> 0)
  {
   // Update pp of old user in db
   $querys= "UPDATE image SET img_url='$img_name' WHERE user_name='$name'";
   $test=mysqli_query($conn,$querys);
   if($test== true){
        $_SESSION['mess'] = "sucessfully Changed";
   }
  }
  else
  {  
    // Inserting pp of new user in db
    $querys= "INSERT INTO image (user_name, img_url) VALUES('$name','$img_name')";
    $test=mysqli_query($conn,$querys);
    if($test== true){
         $_SESSION['mess'] = "sucessfully Uploaded";
    }
  }

  // Move the uploaded file to a secure location
  
  $upload_img= '../uploads/'.$img_name;
  move_uploaded_file($tmp_name, $upload_img);

?>