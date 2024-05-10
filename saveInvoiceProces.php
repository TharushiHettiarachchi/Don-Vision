<?php

require "connection.php";

$order_id = $_POST["order_id"];
$order_date = $_POST["order_date"];
$name = $_POST["name"];
$address = $_POST["address"];
$mobile = $_POST["mobile"];
$r_sph = $_POST["r_sph"];
$r_cyl = $_POST["r_cyl"];
$r_axis = $_POST["r_axis"];
$r_add = $_POST["r_add"];
$l_sph = $_POST["l_sph"];
$l_cyl = $_POST["l_cyl"];
$l_axis = $_POST["l_axis"];
$l_add = $_POST["l_add"];
$pd = $_POST["pd"];
$sh = $_POST["sh"];
$remarks = $_POST["remarks"];
$lens = $_POST["lens"];
$frame = $_POST["frame"];
$frame_price = $_POST["frame_price"];
$lens_price = $_POST["lens_price"];
$other = $_POST["other"];
$amount = $_POST["amount"];
$discount = $_POST["discount"];
$total = $_POST["total"];
$advance = $_POST["advance"];
$balance = $_POST["balance"];

$d =  new DateTime();
$tz =  new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");


Database::iud("INSERT INTO `invoice` (`order_id`, `order_date`, `address`, `mobile`, `r_sph`, `l_sph`, `r_cyl`, `l_cyl`, `r_axis`, `l_axis`, `r_add`, `l_add`, `pd`, `sh`, `remarks`, `lens`, `frame`, `frame_price`, `lens_price`, `other`, `discount`, `advance`,`name`) 
VALUES('".$order_id."','".$date."','".$address."','".$mobile."','".$r_sph."','".$l_sph."','".$r_cyl."','".$l_cyl."','".$r_axis."','".$l_axis."','".$r_add."','".$l_add."','".$pd."','".$sh."','".$remarks."','".$lens."','".$frame."','".$frame_price."','".$lens_price."','".$other."','".$discount."','".$advance."','".$name."')");


echo("Successfully Saved");






















?>