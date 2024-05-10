<?php
require "connection.php";
$category = $_POST["category"];
$subTitle = $_POST["subTitle"];
$qty = $_POST["qty"];
$price = $_POST["price"];
$title = $_POST["title"];
$qty = $_POST["qty"];
$price = $_POST["price"];
$title = $_POST["title"];

if ($category == 0) {
    echo ("1");
} else if (empty($qty)) {
    echo ("3");
}else if (empty($price)) {
    echo ("4");
}else{


if (isset($_FILES["image1"])) {

    $image1 = $_FILES["image1"];

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

        $file_name1 = "products/" . "_" . uniqid() . $new_file_extention;
        move_uploaded_file($image1["tmp_name"], $file_name1);
        // Database::iud("UPDATE `product_images`")
    }
}

if (isset($_FILES["image2"])) {

    $image2 = $_FILES["image2"];

    $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/svg+xml", "image/png");
    $file_ex = $image2["type"];


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

        $file_name2 = "products/" . "_" . uniqid() . $new_file_extention;
        move_uploaded_file($image2["tmp_name"], $file_name2);
        // Database::iud("INSERT INTO `product_images`(`code`,`product_id`) VALUES('".$file_name2."','".$title."')");
    }
}


if (isset($_FILES["image3"])) {

    $image3 = $_FILES["image3"];

    $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/svg+xml", "image/png");
    $file_ex = $image3["type"];


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

        $file_name3 = "products/" . "_" . uniqid() . $new_file_extention;
        move_uploaded_file($image3["tmp_name"], $file_name3);
        // Database::iud("INSERT INTO `product_images`(`code`,`product_id`) VALUES('".$file_name3."','".$title."')");
    }
}

Database::iud("UPDATE `product` SET `price` = '".$price."',`qty`= '".$qty."',`category_id`= '".$category."',`sub_title` = '".$subTitle."' WHERE `id` = '".$title."'");
echo("Successfully Updated");
}
?>

