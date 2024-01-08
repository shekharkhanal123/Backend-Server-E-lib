<?php
date_default_timezone_set('Asia/Kathmandu');
$time= date('Y/n/d-D (g:i A)');
                   $queryes="INSERT INTO returned_books(User_Name,Faculty,Sem_Class,Books,Publication,Returned_Date) VALUES('$name','$faculty',' $class','$books','$publication','$time')";
                   $final=mysqli_query($conn,$queryes);
                   if($final == true)
                   {
                     $_SESSION['mess']="Succesfully Retuned !";
                     $delete= "DELETE FROM borrowed_books WHERE Id IN($column)";
                     $final=mysqli_query($conn,$delete);
                   }
                   else{
                     $_SESSION['err']="Failed To Returned !";
                   }

?>