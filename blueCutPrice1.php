<?php
require "connection.php";
session_start();
$user = $_SESSION["u"];
$lens_rs = Database::search("SELECT * FROM `price` WHERE `item` = 'Blue Cut'");
$lens_data = $lens_rs->fetch_assoc();



$cart_rs  = Database::search("SELECT * FROM `cart` WHERE `user_mobile` = '".$user["mobile"]."'");
$cart_num = $cart_rs->num_rows;
$qty = 0;
for($c=0; $c<$cart_num; $c++){
    $cart_data = $cart_rs->fetch_assoc();
    $qty = $qty + $cart_data["qty"];
}






$price = $qty * intval($lens_data["price"]);


echo( $price." .00" );

 
?>  