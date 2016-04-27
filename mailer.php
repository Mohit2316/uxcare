<?php
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'mailer.anurag@yandex.com';                 // SMTP username
$mail->Password = 'webmail12';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to


$email = $_POST['email'] ? $_POST['email'] : 'unknown email';
$name =  $_POST['name'] ? $_POST['name'] : 'unknown name';
$subject = 'Contact Email from '.$email;
$body = $_POST['Message'] ? $_POST['Message'] : 'Empty Message';

$mail->setFrom($mail->Username, 'Mailer');
$mail->addAddress('anurag2401@gmail.com', 'Anurag Jindal');     // Add a recipient
$mail->addAddress('y.mohit2316@gmail.com', 'Mohit Yadav');     // Add a recipient



$mail->Subject = $subject;
$mail->Body    = $body;
$mail->AltBody = $body;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}