<?php
include "connection.php";
$brand = $_POST["brand"];
$brand_rs =Database::search("SELECT * FROM `brand` WHERE `id` = '".$brand."'");
$brand_data = $brand_rs->fetch_assoc();
$id = hexdec(uniqid());
$id = substr($id,-6);
$code = $brand_data["code"]."".$id;
echo($code);

?>
