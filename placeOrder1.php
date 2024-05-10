<?php

session_start();
$user = $_SESSION["u"];

require "connection.php";

// $title = $_POST["title"];
// $qty = $_POST["qty"];

$prescription = $_POST["prescription"];
$blueCut = $_POST["blueCut"];
$uv = $_POST["uv"];
$subTotal = $_POST["subTotal"];

if(isset($_FILES["uploadPrescription"])){
    $image1 = $_FILES["uploadPrescription"];
    

    $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/svg+xml", "image/png");
    $file_ex = $image1["type"];


    if (!in_array($file_ex, $allowed_image_extentions)) {
        echo ("Please a valid image");
    } else {

        $new_file_extention;
        if ($file_ex == "image/jpg") {
            $new_file_extention = ".jpg";
        } else if ($file_ex == "image/jpeg") {
            $new_file_extention = ".jpeg";
        } else if ($file_ex == "image/png") {
            $new_file_extention = ".png";
        } else if ($file_ex == "image/svg+xml") {
            $new_file_extention = ".svg";
        }

        $file_name1 = "prescription/" . "_" . uniqid() . $new_file_extention;
        move_uploaded_file($image1["tmp_name"], $file_name1);
        Database::iud("UPDATE `user` SET `prescription`= '".$file_name1."' WHERE `mobile` = '".$user["mobile"]."'");
    }

}
$order_id = hexdec(uniqid());
$order_id = substr($order_id,-8);

$d =  new DateTime();
    $tz =  new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `order_details`(`order_id`,`date_time`,`user_mobile`,`total`) 
VALUES('".$order_id."','".$date."','".$user["mobile"]."','".$subTotal."')");


$cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_mobile` = '".$user["mobile"]."'");
$cart_num = $cart_rs->num_rows;

for($r=0; $r<$cart_num; $r++){
$cart_data = $cart_rs->fetch_assoc();

Database::iud("INSERT INTO `orders`(`order_id`,`product_id`,`qty`,`lens`,`blue_cut`,`uv_protection`) 
VALUES('".$order_id."','".$cart_data["product_id"]."','".$cart_data["qty"]."','".$prescription."','".$blueCut."','".$uv."')");


}

Database::iud("DELETE  FROM `cart` WHERE `user_mobile` = '".$user["mobile"]."'");

echo("Order Successfully Placed");
