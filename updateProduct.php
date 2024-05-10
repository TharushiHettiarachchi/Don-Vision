<?php
include "connection.php";
if(isset($_GET["id"])){
    $pid = $_GET["id"];
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>DonVision | Addproduct</title>
</head>

<body class="adpBody">
    <?php include "adminHeader.php" ?>
    <div class="adPd1">
        <h2 style="color: rgb(62, 62, 62);">DonVision | Update Product</h2>
        <hr>
    </div>
    <?php
    

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`  = '" . $pid . "'");
    $product_data = $product_rs->fetch_assoc();

    ?>

    <div class="adPd2">

        <div class="adP3">
            <label for="category">Select a Category</label>
            <span id="categoryAlert" class="alert"></span>
            <select name="" id="category" class="addProductInput1">
                <option value="0">select category</option>
                <?php
                $category_rs = Database::search("SELECT * FROM `category`");
                $category_num = $category_rs->num_rows;
                for ($x = 0; $x < $category_num; $x++) {
                    $category_data = $category_rs->fetch_assoc();
                ?>
                    <option value="<?php echo ($category_data["id"]); ?>" <?php if ($category_data["id"] == $product_data["category_id"]) { ?> selected <?php } ?>><?php echo ($category_data["category_name"]); ?></option>

                <?php
                }
                ?>
            </select>
        </div>

        <div class="adP3">
            <label for="brand">Select a Brand</label>
            <span id="brandAlert" class="alert"></span>
            <select name="" id="brand" class="addProductInput1" onchange="setTitle();" disabled>
                <option value="0">select brand</option>
                <?php
                $brand_rs = Database::search("SELECT * FROM `brand`");
                $brand_num = $brand_rs->num_rows;
                for ($y = 0; $y < $brand_num; $y++) {
                    $brand_data = $brand_rs->fetch_assoc();
                ?>
                    <option value="<?php echo ($brand_data["id"]); ?>" <?php if ($brand_data["id"] == $product_data["brand_id"]) { ?> selected <?php } ?>><?php echo ($brand_data["brand_name"]); ?></option>
                    <div style="display:none;" id="example"><?php echo ($brand_data["brand_name"]); ?></div>

                <?php
                }
                ?>
            </select>
        </div>

        <div class="adP3">
            <label for="category">Product Title</label>
            <input type="text" class="addProductInput1" id="title" value="<?php echo ($product_data["id"]); ?>" disabled>
        </div>

        <div class="adP3">
            <label for="category">Product Subtitle</label>
            <input type="text" class="addProductInput1" id="subTitle" value="<?php echo ($product_data["sub_title"]); ?>">
        </div>

        <div class="adP3">
            <label for="category">Product Quantity</label>
            <span id="qtyAlert" class="alert"></span>
            <input type="number" class="addProductInput1" id="qty" min="0" value="<?php echo ($product_data["qty"]); ?>">
        </div>

        <div class="adP3">
            <label for="category">Product Price</label>
            <span id="priceAlert" class="alert"></span>
            <input type="text" class="addProductInput1" id="price" value="<?php echo ($product_data["price"]); ?>">
        </div>

        <div class="adP5">
            <label for="category">Product Image</label>
            <span id="imageAlert" class="alert"></span>
            <div class="adP7">
                <input type="file" style="display: none;" accept="images/*" multiple class="addProductInput2" id="addProductInput2" />
                <label for="addProductInput2" onclick="addProductImage1();">Choose Product Image </label>

            </div>
            <div class="adP4">
                <?php
                ?>
                <div class="offset-lg-3 col-12 col-lg-6">
                    <div class="row">

                        <?php

                        $img = array();
                        $img[0] = "resources/addproductimg.png";
                        $img[1] = "resources/addproductimg.png";
                        $img[2] = "resources/addproductimg.png";


                        $images_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $pid . "'");
                        $images_num = $images_rs->num_rows;

                        for ($x = 0; $x < $images_num; $x++) {
                            $img_data = $images_rs->fetch_assoc();
                            $img[$x] = $img_data["code"];
                        }



                        ?>
                        <div class="adP4">
                            <div class="adP6">
                                <img src="<?php echo $img[0]; ?>" class="" style="width: 180px;" id="i0" />
                            </div>

                            <div class="adP6">
                                <img src="<?php echo $img[1]; ?>" alt="empty" class="" style="width: 180px;" id="i1" />
                            </div>

                            <div class="adP6">
                                <img src="<?php echo $img[2]; ?>" alt="empty" class="" style="width:180px;" id="i2" />
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <button class="addProductButton1" onclick="updateProductItem();">Update Product</button>
      
            </div>
            <div class="footer2">
        &copy;2023 | Don Vision | All rights reserved<br />
        Powered by <a href="http://www.hendecagen.com/" style="text-decoration:none ; color:gray"><b>HENDECAGEN</b></a>
    </div>
    
</body>

</html>
    <?php
}else{
    echo("Something went wrong");
}

?>

