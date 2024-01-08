<?php
 $name=$_SESSION['User_Name'];
 $conn = mysqli_connect("localhost","root","","library");
 $qrys="SELECT * FROM image WHERE User_Name='$name'";
 $namecheck=mysqli_query($conn,$qrys);

 //if user pp is available
 if(mysqli_num_rows($namecheck)> 0)
 {
    $querys= "SELECT * FROM image WHERE user_name='$name'";
 }
 else //if user pp isn't available
 {  
    $querys= "SELECT * FROM image WHERE user_name='default'";
 }
 
 $test=mysqli_query($conn,$querys);

 if($test==true){

    $user=mysqli_fetch_assoc($test);

    $id= $user["id"];
    $u_name= $user["user_name"];
    $img= $user["img_url"];
 }
?>
src="../uploads/<?php echo $img; ?>"

