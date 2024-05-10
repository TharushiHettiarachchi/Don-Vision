<?php
require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];

$password = hexdec(uniqid());
$password = substr($password, -8);

if (empty($fname)) {
    echo ("Please enter your First Name");
} else if (empty($lname)) {
    echo ("Please enter your Last Name");
} else if (empty($mobile)) {
    echo ("Please enter your Mobile Number");
} else if (empty($email)) {
    echo ("Please enter your Email");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email !!");
}else if(strlen($mobile)>10){
    echo("Mobile must have 10 Characters !!");
} else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)){
echo("Invalid Mobile Number !!");
}else{
    $d =  new DateTime();
    $tz =  new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `user`(`fname`,`lname`,`email`,`mobile`,`password`,`gender_id`,`registered_date`,`payment_method_id`) VALUES('" . $fname . "','" . $lname . "','" . $email . "','" . $mobile . "','" . $password . "','1','".$date."','1')");


    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'tharushihettiarachchi12@gmail.com';
    $mail->Password = 'gdbjjktmvjpmsmfl';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('tharushihettiarachchi12@gmail.com', 'Don Vision Account Password');
    $mail->addReplyTo('tharushihettiarachchi12@gmail.com', 'Don Vision Account Password');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'Don Vision Account Password';
    $bodyContent = '<p>Hello ' . $fname . ',</p><p>Welcome to Don Vision.</p><p>Please use the following details to sign in to your Don Vision Account</p><h3 style="text-decoration:none;">Email: ' . $email . '</h3><h3>Password: ' . $password . '</h3>';
    
    $mail->Body    = $bodyContent;
    
    if (!$mail->send()) {
        echo ("Password sending failed");
    } else {
        echo ("Password has been sent to your email. Your Password is " . $password);
    }
    
}




