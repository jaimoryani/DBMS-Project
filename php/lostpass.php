<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// require 'PHPMailer/Exception.php';
// require 'PHPMailer/PHPMailer.php';
//     require("PHPMailer/SMTP.php");
// use PHPMailer\SMTP;
function sendPassword($email, $password)
{
    require_once("PHPMailer/PHPMailer.php");
    require_once("PHPMailer/SMTP.php");
    require_once("PHPMailer/Exception.php");
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
        $mail->addAddress($email);     //Add a recipient
        //Name is optional

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = "Regarding password of the feedback Portal - $password";
        $mail->Body    = "Hey your OTP is $password.";
        $mail->send();
        echo 'Message has been sent';
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}
