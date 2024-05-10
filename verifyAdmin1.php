<?php
require "connection.php";
session_start();

$code = $_POST["code"];

$admin_rs = Database::search("SELECT * FROM `admin` WHERE `verification_code` = '" . $code . "'");
$admin_num = $admin_rs->num_rows;
if($admin_num == 1){
$admin_data = $admin_rs->fetch_assoc();
$_SESSION["a"] = $admin_data;
echo("welcome");
}else{
    echo("Invalid User");
}























?>