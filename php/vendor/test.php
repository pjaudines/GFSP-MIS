<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/phpmailer/src/Exception.php';
    require 'PHPMailer/phpmailer/src/PHPMailer.php';
    require 'PHPMailer/phpmailer/src/SMTP.php';

    require 'autoload.php';
    $mail = new PHPMailer(true);
    try{
        $mail->SMTPDebug = 2;                              
        $mail->isSMTP();                                      
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;                               
        $mail->Username = 'gibrosenfiresafety@gmail.com';                 
        $mail->Password = 'mrhhffagbhedvpox';                           
        $mail->SMTPSecure = 'ssl';                            
        $mail->Port = 465;      
        
        $mail->setFrom('gibrosenfiresafety@gmail.com', 'Gibrosen');
        $mail->addAddress('dennzel.cuachon123@gmail.com', 'TEST');     // Add a recipient
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
    
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mail->send();
        echo 'Message has been sent';

    }catch(Exception $e){
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo; 
    }
?>