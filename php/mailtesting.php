<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// require 'PHPMailer/Exception.php';
// require 'PHPMailer/PHPMailer.php';
//     require("PHPMailer/SMTP.php");
// use PHPMailer\SMTP;
function sendMail()
{
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");
    $mail = new PHPMailer(true);

    try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'replytofeedbackmanagement@gmail.com';                     //SMTP username
    $mail->Password   = 'fwbynkkrcnktnali';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('replytofeedbackmanagement@gmail.com', 'Mailer');
    $mail->addAddress('iit2021184@iiita.ac.in');     //Add a recipient
    $mail->addAddress('iit2021155@iiita.ac.in');               //Name is optional
    $mail->addAddress('iit2021163@iiita.ac.in');               //Name is optional
    $mail->addAddress('iit2021122@iiita.ac.in');  
    $mail->addAddress('iit2021109@iiita.ac.in');               //Name is optional
                 //Name is optional

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Testing';
    $mail->Body    = 'Hellooooooooooooooooooooo hdwufbuebfeufeufu Testing \n wifwifbwifbiw';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

sendMail()



?>