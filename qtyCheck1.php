<?php

session_start();
$user = $_SESSION["u"];
require "connection.php";
$qty = $_POST["qty"];

$quantity = intval($qty);
$pid = $_POST["pid"];

$check_rs = Database::search("SELECT * FROM `cart` WHERE `product_id` = '".$pid."' AND `user_mobile` = '".$user["mobile"]."'");
$check_num = $check_rs->num_rows;

if($check_num == 0){
    echo("Something Went Wrong");
}else{

    Database::iud("UPDATE `cart` SET `qty` = '".$quantity."' WHERE `user_mobile` = '".$user["mobile"]."' AND `product_id` = '".$pid."'");
    // echo("successful");
}



























?>