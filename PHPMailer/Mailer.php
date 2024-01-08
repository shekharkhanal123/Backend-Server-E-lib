<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    

    $name=$_POST['name'];
    $email=$_POST['email'];
    
    require 'src/Exception.php';
    require 'src/PHPMailer.php';
    require 'src/SMTP.php';
    
    $code = rand(999999, 111111);  //generating code
    $otp = $code;
    function genOTP(){
     
        return $otp;
    }
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'elibrarysup@gmail.com';                     //SMTP username
        $mail->Password   = 'zxvqfrkqczfnvqge';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS ;           //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('elibrarysup@gmail.com', 'E library');
        $mail->addAddress($email,$name);     //Add a recipient
        
        $mail->addReplyTo('elibrarysup@gmail.com', 'E library');
    
         
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject ='Email Verification';
        $mail->Body = "Your code is <b>".$otp."</b><BR><b>WARNING:</b> Do not share this code with other!";
    
        $mail->send();
        
    } 
    catch (Exception $e)
    {
        echo json_encode(array('message'=>"Failed To connect server!"));
    }


?>