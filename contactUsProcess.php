<?php

require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$message = $_POST["message"];
$email1 = "tharushihettiarachchi12@gmail.com";


$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'tharushihettiarachchi12@gmail.com';
$mail->Password = 'gdbjjktmvjpmsmfl';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('tharushihettiarachchi12@gmail.com', 'Don Vision Customer Message');
$mail->addReplyTo('tharushihettiarachchi12@gmail.com', 'Don Vision Customer Message');
$mail->addAddress($email1);
$mail->isHTML(true);
$mail->Subject = 'Don Vision Customer Message';
$bodyContent = '<p>From :'.$email.'</p><p> Name :' . $fname . ' '.$lname.',</p><p> Message :' . $message . ',</p>';

$mail->Body    = $bodyContent;

if (!$mail->send()) {
    echo ("Message sending failed");
} else {
    echo ("Message Sent Successfully");
}












?>