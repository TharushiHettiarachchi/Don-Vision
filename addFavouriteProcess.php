<?php
 session_start();
 require "connection.php";

 $user = $_SESSION["u"];
 $product_id = $_GET["id"];

$product_rs = Database::search("SELECT * FROM `favourite` WHERE `product_id` = '".$product_id."' AND `user_mobile` = '".$user["mobile"]."'");
$product_num = $product_rs->num_rows;
if($product_num == 0){
    Database::iud("INSERT INTO `favourite`(`product_id`,`user_mobile`) VALUES('".$product_id."','".$user["mobile"]."')");
    echo("Added to Favourites");

}else{
    Database::iud("DELETE FROM `favourite` WHERE `product_id` = '".$product_id."' AND `user_mobile` = '".$user["mobile"]."'");
    echo("Removed from Favourites");
}

 


?>