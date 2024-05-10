<?php

require "connection.php";


    $pid = $_POST["title"];


    $subtitle = $_POST["subTitle"];
    $qty = $_POST["qty"];
    $cost = $_POST["cost"];
    $category = $_POST["category"];
    

   

    Database::iud("UPDATE `product` SET `sub_title`='".$subtitle."',`qty`='".$qty."',`price`='".$cost."',
    `category_id`='".$category."' WHERE `id`='".$pid."'");

    echo("Your Product has been updated");

    $length = sizeof($_FILES);
    $allowed_img_extentions = array("image/jpg","image/jpeg","image/png","image/svg+xml");

   

    if($length <= 3 && $length > 0){
     Database::iud("DELETE FROM `product_images` WHERE `product_id`='".$pid."'");

        for($x = 0; $x < $length; $x++){
            if(isset($_FILES["i".$x])){

                $img_file = $_FILES["i".$x];
                $file_type = $img_file["type"];

                if(in_array($file_type,$allowed_img_extentions)){
                    $new_img_extention;

                    if($file_type == "image/jpg"){
                        $new_img_extention = ".jpg";
                    }else if($file_type == "image/jpeg"){
                        $new_img_extention = ".jpeg";
                    }else if($file_type == "image/png"){
                        $new_img_extention = ".png";
                    }else if($file_type == "image/image/svg+xml"){
                        $new_img_extention = ".svg";
                    }

                    $file_name = "resources/".$pid."_".$x."_".uniqid().$new_img_extention;
                    move_uploaded_file($img_file["tmp_name"],$file_name);

                     Database::iud("INSERT INTO `product_images`(`code`,`product_id`) VALUES ('".$file_name."','".$pid."')");

                   

                }else{
                    echo("File Type not allowed !");
                }

            }
        }


    }else{
        echo("NO any Images to update ! ");
    }
