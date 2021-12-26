<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
// Rescue My Appliances settings
$toEmail = "yourrecipient@email.com";
$content = nl2br("From: " . $_REQUEST['name'] . "\r\n"
."Email: ". $_REQUEST["email"] . "\r\n"
."Phone: ". $_REQUEST["phone"] . "\r\n"
."Address: ". $_REQUEST["address"] . "\r\n"
."Appliance: ". $_REQUEST["appliance"] . "\r\n"
."Problem: ". $_REQUEST["problem"] .  "\r\n"
.">\r\n");

// End Rescue my appliances settings
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'a2plcpnl0092.prod.iad2.secureserver.net;mail.rescuemyappliances.com ';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'your@email.com';                 // SMTP username
$mail->Password = 'yourPassword';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('your@email.com', 'Rescue My Appliances');
$mail->addAddress('yourRecipient@email.com', 'Joe User');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Work order request';
$mail->Body    = $content;
$mail->AltBody = $content;

if(!$mail->send()) {
    echo false;
    // echo 'Message could not be sent.';
    // echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo true;
    // echo 'Message has been sent';
}
?>