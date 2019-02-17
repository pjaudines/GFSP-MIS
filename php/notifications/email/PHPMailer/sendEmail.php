<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    $clientEmail = $_POST['clientEmail'];
    $txtSubject = $_POST['txtSubject'];
    $txtBody = $_POST['txtBody'];

    require 'PHPMailer/phpmailer/src/Exception.php';
    require 'PHPMailer/phpmailer/src/PHPMailer.php';
    require 'PHPMailer/phpmailer/src/SMTP.php';

    require 'autoload.php';
    $mail = new PHPMailer(true);
    try{
                             
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                               
        $mail->Username = 'gibrosenfiresafety@gmail.com';                 
        $mail->Password = 'mrhhffagbhedvpox';                           
        $mail->SMTPSecure = 'ssl';                            
        $mail->Port = 465;      
        
        $mail->setFrom('gibrosenfiresafety@gmail.com', 'Gibrosen');
        $mail->addAddress($clientEmail);     // Add a recipient
        $mail->addReplyTo('gibrosenfiresafety@gmail.com', 'Gibrosen Fire Safety Products');        
    
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $txtSubject;
        $mail->Body    =  $txtBody;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mail->send();
        header("Location: ../../../../pages/notifications/email.php");
        
    }catch(Exception $e){
        
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo; 
    }
?>