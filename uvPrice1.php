<?php
require "connection.php";
session_start();
$user = $_SESSION["u"];
$lens_rs1 = Database::search("SELECT * FROM `price` WHERE `item` = 'UV Protection'");
$lens_data1 = $lens_rs1->fetch_assoc();



$cart_rs1  = Database::search("SELECT * FROM `cart` WHERE `user_mobile` = '".$user["mobile"]."'");
$cart_num1 = $cart_rs1->num_rows;
$qty1 = 0;
for($e=0; $e<$cart_num1; $e++){
    $cart_data1 = $cart_rs1->fetch_assoc();
    $qty1 = $qty1 + $cart_data1["qty"];
}






$price1 = $qty1 * intval($lens_data1["price"]);


echo( $price1." .00" );

 
?>  