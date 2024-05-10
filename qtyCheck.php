<?php
require "connection.php";
$pid = $_POST["pid"];
$qty = $_POST["qty"];

$qty_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$pid."'");
$qty_data = $qty_rs->fetch_assoc();

$haveQty = $qty_data["qty"];
if($qty > $haveQty){
    echo($haveQty);
}else if($qty == 0){
    echo("1");
}else if($qty < 0){
    echo("1");
}else if($qty < $haveQty){
    echo($qty);  
}

?>