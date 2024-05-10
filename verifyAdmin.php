<?php

require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$email = $_POST["email"];
$admin_rs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "'");
$admin_num = $admin_rs->num_rows;
if ($admin_num == 1) {
    $admin_data = $admin_rs->fetch_assoc();
    $code = hexdec(uniqid());
    $code = substr($code, -8);

    Database::iud("UPDATE `admin` SET `verification_code` ='" . $code . "'  WHERE `email` = '" . $admin_data["email"] . "'");

    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tharushihettiarachchi12@gmail.com';
    $mail->Password = 'gdbjjktmvjpmsmfl';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('tharushihettiarachchi12@gmail.com', 'Don Vision Admin Verification');
    $mail->addReplyTo('tharushihettiarachchi12@gmail.com', 'Don Vision Admin Verification');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Don Vision Admin Verification';
    $bodyContent = '<p>Hello ' . $admin_data["fname"] . ',</p><p>Welcome to Don Vision Admin Sign In.</p><p>Please use the following Verification code to sign in to your Don Vision Admin Panel</p><h3>Verification Code: ' . $code . '</h3>';

    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo ("code sending failed");
    } else {
        echo ("welcome");
    }















   
} else {
    echo ("Invalid Email Address");
}
