<?php
 require "connection.php";
$pid = $_POST["pid"];

// Database::iud("DELETE FROM `product_images` WHERE `product_id` = '".$pid."'");
 Database::iud("DELETE FROM `product` WHERE `id` = '".$pid."'");
 

echo("Product Deleted Successfully");


?>