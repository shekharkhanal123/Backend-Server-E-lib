<?php
if(isset($_POST['pbtn']))
{

    while($row= mysqli_fetch_assoc($test))
    {
    
        if(password_verify($cpass,$row['Pass']))
        {
            if($conpass==$npass)
            {
                $hasspass=password_hash($conpass, PASSWORD_DEFAULT); //generating hash password
                $query= "UPDATE $tname SET Pass='$hashpass' WHERE Email = '$name' ";
                $ans=mysqli_query($conn,$query);
                if($ans==true){
                    $_SESSION['mess']  =" Password Changed !";
                }
            }
            else{
                $_SESSION['err']  =" Password doesn't match !";
            }
        }
        else{
            $_SESSION['err']  =" Wrong Password";
        }
    }

}
elseif(isset($_POST['sbtn']))
{
    while($row= mysqli_fetch_assoc($test))
    {
    
        if(password_verify($cpass,$row['Pass']))
        {
                $query= "UPDATE $tname SET  Email='$uemail' AND Place='$uadd' AND Phone='$uphone' WHERE User_Name = '$name' ";
                $ans=mysqli_query($conn,$query);
                if($ans==true){
                    $_SESSION['Email'] = $row['Email'];
                    $_SESSION['mess']  =" Info Changed !";
                }
        }
        else{
            $_SESSION['err']  =" Wrong Password";
        }
    }
}
elseif(isset($_POST['ebtn'])){
    while($row= mysqli_fetch_assoc($test))
    {
        if(password_verify($cpass,$row['Pass']))
        {
           
                $query= "UPDATE $tname SET  Email='$email' WHERE User_Name = '$name' ";
                $ans=mysqli_query($conn,$query);
                if($ans==true){
                    $_SESSION['Email'] = $row['Email'];
                    $_SESSION['mess']  =" Info Changed !";
                   
                }
        }
        else{
            $_SESSION['err']  =" Wrong Password";
        }
    }
    
}


?>