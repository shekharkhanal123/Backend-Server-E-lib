<?php
  date_default_timezone_set('Asia/Kathmandu');
  $querys="SELECT * FROM borrowed_books WHERE User_Name='$name' ";
  $test=mysqli_query($conn,$querys);
  
  if($test == true)
  {      
      if(mysqli_num_rows($test) > 0)
      { 
        $qry="SELECT * FROM borrowed_books WHERE User_Name='$name' AND Books='$books'AND Publication='$publication'";
        $check=mysqli_query($conn,$qry);
        if(mysqli_num_rows($check) == 0){
                  $time= date('Y/n/d-D (g:i A)');
                   $queryes="INSERT INTO borrowed_books(User_Name,Faculty,Sem_Class,Books,Publication,Borrowed_Date) VALUES('$name','$faculty',' $class','$books','$publication','$time')";
                   $final=mysqli_query($conn,$queryes);
                   if($final == true)
                   {
                      $delete= "DELETE FROM book_requests WHERE Id IN($column)";
                      $comp=mysqli_query($conn,$delete);
                      if($comp==true){
                         $_SESSION['mess']="Book Borrowed";
                      }
                      else{
                        $_SESSION['err']=" Failed To Borrow";
                      }
                   }
                   else{
                     $_SESSION['err']=" Failed To Borrow";
                   }
        }
        else{
          $_SESSION['war']="User had already Borrrowed this book";
        }
      }
      else
      {
        $time= date('Y/n/d-D (g:i A)');
        $queryes="INSERT INTO borrowed_books(User_Name,Faculty,Sem_Class,Books,Publication,Borrowed_Date) VALUES('$name','$faculty',' $class','$books','$publication','$time')";
        $final=mysqli_query($conn,$queryes);
        if($final == true)
        {
           $delete= "DELETE FROM book_requests WHERE Id IN($column)";
           $comp=mysqli_query($conn,$delete);
           if($comp==true){
              $_SESSION['mess']="Book Borrowed";
           }
           else{
             $_SESSION['err']=" Failed To Borrow";
           }
        }
        else{
          $_SESSION['err']=" Failed To Borrow";
        }
      }
  }  
   
    

?>
