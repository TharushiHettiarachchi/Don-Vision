<?php
require "connection.php";
$lens_rs = Database::search("SELECT * FROM `price` WHERE `item` = 'Blue Cut'");
$lens_data = $lens_rs->fetch_assoc();

echo( $lens_data["price"]." .00" );

 
?>  