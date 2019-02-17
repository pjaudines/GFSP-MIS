<?php
    
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    $mail->Username = 'gibrosenfiresafety@gmail.com';
    $mail->Password = 'gibrosenfiresafety2019';
    $mail->SetFrom('test@test.com');
    $mail->Subject = 'Hello World';
    $mail->Body = 'A test emal!';
    $mail->AddAddress('iam7kei@gmail.com');

    $mail->Send();
?>