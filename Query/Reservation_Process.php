
<?php

  $querys="SELECT * FROM book_requests WHERE User_Name='$name' ";
  $test=mysqli_query($conn,$querys);
  
  if($test == true)
  {      
      if(mysqli_num_rows($test) > 0)
      {        
         if(mysqli_num_rows($test) <4)
          {
            $bqry="SELECT * FROM borrowed_books WHERE User_Name='$name' AND Books='$books'AND Publication='$publication'";
            $bcheck=mysqli_query($conn,$bqry);
            if(mysqli_num_rows($bcheck) == 0)
            {
              $rqry="SELECT * FROM book_requests WHERE User_Name='$name' AND Books='$books'AND Publication='$publication' ";
              $rcheck=mysqli_query($conn,$rqry);
              if(mysqli_num_rows($rcheck) == 0)
              {
                $queryes="INSERT INTO book_requests(User_Name,Faculty,Sem_Class,Books,Publication) VALUES('$name','$faculty',' $class','$books','$publication')";
                $final=mysqli_query($conn,$queryes);
                if($final == true)
                {
                  $_SESSION['mess']="Succesfully Reserved ! You can now get Your Books From E-Library";
                }
                else{
                  $_SESSION['err']="Reservation Failed";
                }
              }
              else{
                $_SESSION['war']="You have already Reserved this book";
              }
            }
            else{
              $_SESSION['war']="You have already Borrowed this book";
            }

          }
          else{
            $_SESSION['war']="You have reached the limit to borow book ( BOOK COUNT: 3 )";
          }
      }
      else
      {
        $bqry="SELECT * FROM borrowed_books WHERE User_Name='$name' AND Books='$books'AND Publication='$publication'";
        $bcheck=mysqli_query($conn,$bqry);
            if(mysqli_num_rows($bcheck) == 0)
            {
              $queryes="INSERT INTO book_requests(User_Name,Faculty,Sem_Class,Books,Publication) VALUES('$name','$faculty',' $class','$books','$publication')";
              $final=mysqli_query($conn,$queryes);
              if($final == true)
              {
                $_SESSION['mess']="Succesfully Reserved ! You can now get Your Books From E-Library";
              }
              else{
                $_SESSION['err']="Reservation Failed";
              }
            }
            else{
              $_SESSION['war']="You have already Borrowed this book";
            }
      }
  }  
   
    

?>