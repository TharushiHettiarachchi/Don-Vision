<?php
require "connection.php";
session_start();
$user = $_SESSION["u"];

$oid = $_POST["oid"];
$pid = $_POST["pid"];




Database::iud("DELETE FROM `orders` WHERE `order_id` = '".$oid."' AND `product_id` = '".$pid."'");
echo("Successfully Deleted");

















?>