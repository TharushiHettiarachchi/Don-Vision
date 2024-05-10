<?php
require  "connection.php";
session_start();
$email = $_POST["email"];
$password = $_POST["password"];

if (empty($email)) {
    echo ("Please enter your Email");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email !!");
} else if (empty($password)) {
    echo ("Please enter your Password");
} else {
    $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");
    $user_num = $user_rs->num_rows;
    if ($user_num == 1) {
        $user_data = $user_rs->fetch_assoc();
        $_SESSION["u"] = $user_data;
        echo("Successfully Signed In");
    } else {
        echo ("Invalid Email or Password");
    }
}
