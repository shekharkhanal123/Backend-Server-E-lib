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
                    $_SESSION['err']  ="New Password doesn't match !";
                }
            }
            else{
                $_SESSION['err']  =" Wrong Password";
            }
    }

}

elseif(isset($_POST['aebtn']))
{

    while($row= mysqli_fetch_assoc($test))
    {
        if(password_verify($cpass,$row['Pass']))
        {
           
                $query= "UPDATE $tname SET  Email='$email'  WHERE Email = '$name' ";
                $ans=mysqli_query($conn,$query);
                if($ans==true){
                    $_SESSION['admin_email'] = $row['Email'];
                    $_SESSION['mess']  =" Info Changed !";
                   
                }
        }
        else{
            $_SESSION['err']  =" Wrong Password";
        }
    }
    

}

?>