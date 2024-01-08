<?php
date_default_timezone_set('Asia/Kathmandu');
$time= date('Y/n/d-D (g:i A)');
                   $queryes="INSERT INTO po_user(User_Name,Email,Place,Phone,Date) VALUES('$name','$email',' $address','$phone','$time')";
                   $final=mysqli_query($conn,$queryes);
                   if($final == true)
                   {
                     $_SESSION['mess']="Succesfully Removed!";
                     $delete= "DELETE FROM members WHERE Id IN($column)";
                     $final=mysqli_query($conn,$delete);
                   }
                   else{
                     $_SESSION['err']="Failed To Returned !";
                   }

?>