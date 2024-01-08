<?php
date_default_timezone_set('Asia/Kathmandu');
$time= date('Y/n/d-D (g:i A)');
                   $his="INSERT INTO user_history(User_Name,Faculty,Sem_Class,Books,Publication,Borrowed_Date,Returned_Date) VALUES('$name','$faculty',' $class','$books','$publication','$borrowed','$time')";
                   $fin=mysqli_query($conn,$his);

?>