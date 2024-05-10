<?php
session_start();
require "connection.php";
$user = $_SESSION["u"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$gender = $_POST["gender"];
$payment = $_POST["payment"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$city = $_POST["city"];
$district = $_POST["district"];
$province = $_POST["province"];
$postal_code = $_POST["postal_code"];


Database::iud("UPDATE `user` SET `fname` = '".$fname."',`lname` = '".$lname."',`gender_id` = '".$gender."', `payment_method_id` = '".$payment."' WHERE `mobile` = '".$user["mobile"]."'");
   

$address_rs = Database::search("SELECT * FROM `address` WHERE `user_mobile` = '".$user["mobile"]."'");
$address_num = $address_rs->num_rows;
if($address_num == 0){
    $city_rs = Database::search("SELECT * FROM `city` WHERE `city` = '".$city."'");
    $city_num = $city_rs->num_rows;
    if($city_num == 0){
        Database::iud("INSERT INTO `city` (`city`,`district_id`) VALUES('".$city."','".$district."')");
        $city_rs = Database::search("SELECT * FROM `city` WHERE `city` = '".$city."'");
        $city_data = $city_rs->fetch_assoc();
        Database::iud("INSERT INTO  `address` (`address_line1`,`address_line2`,`postal_code`,`city_id`,`user_mobile` ) VALUES('".$address1."','".$address2."','".$postal_code."','".$city_data["id"]."','".$user["mobile"]."')");
    }else{
        $city_data = $city_rs->fetch_assoc();
        Database::iud("INSERT INTO  `address` (`address_line1`,`address_line2`,`postal_code`,`city_id`,`user_mobile` ) VALUES('".$address1."','".$address2."','".$postal_code."','".$city_data["id"]."','".$user["mobile"]."')");
   
    }
   
}else{
    $city_rs = Database::search("SELECT * FROM `city` WHERE `city` = '".$city."'");
    $city_num = $city_rs->num_rows;
    if($city_num == 0){
        Database::iud("INSERT INTO `city` (`city`,`district_id`) VALUES('".$city."','".$district."')");
        $city_rs = Database::search("SELECT * FROM `city` WHERE `city` = '".$city."'");
        $city_data = $city_rs->fetch_assoc();
        Database::iud("UPDATE `address` SET `address_line1` = '".$address1."',`address_line2` = '".$address2."',`postal_code` = '".$postal_code."', `city_id` = '".$city_data["id"]."' WHERE `user_mobile` = '".$user["mobile"]."'");
    }else{
        $city_data = $city_rs->fetch_assoc();
        Database::iud("UPDATE `address` SET `address_line1` = '".$address1."',`address_line2` = '".$address2."',`postal_code` = '".$postal_code."', `city_id` = '".$city_data["id"]."' WHERE `user_mobile` = '".$user["mobile"]."'");
   
    }
       
}

echo("Successfully Updated")



















?>