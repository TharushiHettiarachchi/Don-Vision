<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/pic10.jpg" />
    <title>Don Vision | Manage Products</title>
</head>

<body class="adpBody">
    <?php include "connection.php"; ?>
    <?php include "adminHeader.php" ?>
    <div class="manageProductDiv1">Manage Products</div>
    <div class="manageProductDiv2">
        <div class="manageProductDiv3">
            <input type="text" id="searchText" class="manageProductsInput1" placeholder="Search by ID" onkeyup="searchManageProducts();" />
        </div>
        <div class="manageProductDiv3">
            <select name="" id="category" class="manageProductsInput1" onchange="searchManageProducts();">
                <option value="0">select category</option>
                <?php
                $category_rs = Database::search("SELECT * FROM `category`");
                $category_num = $category_rs->num_rows;
                for ($x = 0; $x < $category_num; $x++) {
                    $category_data = $category_rs->fetch_assoc();
                ?>
                    <option value="<?php echo ($category_data["id"]); ?>"><?php echo ($category_data["category_name"]); ?></option>

                <?php
                }
                ?>
            </select>
        </div>
        <div class="manageProductDiv3">
            <select name="" id="brand" class="manageProductsInput1" onchange="searchManageProducts();">
                <option value="0">select brand</option>
                <?php
                $brand_rs = Database::search("SELECT * FROM `brand`");
                $brand_num = $brand_rs->num_rows;
                for ($y = 0; $y < $brand_num; $y++) {
                    $brand_data = $brand_rs->fetch_assoc();
                ?>
                    <option value="<?php echo ($brand_data["id"]); ?>"><?php echo ($brand_data["brand_name"]); ?></option>
                    <div style="display:none;" id="example"><?php echo ($brand_data["brand_name"]); ?></div>

                <?php
                }
                ?>
            </select>
        </div>

    </div>
    <div class="manageProductDiv4" id="searchBox">
        <?php
        $product_rs = Database::search("SELECT * FROM `product`");
        $product_num = $product_rs->num_rows;
        for ($p = 0; $p < $product_num; $p++) {
            $product_data = $product_rs->fetch_assoc();
            $image_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $product_data["id"] . "'");
            $image_data = $image_rs->fetch_assoc();

        ?>
            <!-- product card -->
            <div class="manageProductDiv5">
                <div class="shopDiv5">
                    <img src="<?php echo ($image_data["code"]); ?>" class="shopProduct1" />
                </div>
                <hr />
                <div class="shopDiv6">
                    <span class="shopProductTitle"><?php echo ($product_data["id"]); ?></span>
                    <span class="shopProductPrice">Rs. <?php echo ($product_data["price"]); ?> .00</span>
                    <div class="manageProductDiv6">
                    <a href='<?php echo "updateProduct.php?id=" . $product_data["id"]; ?>' style="width:100%; display:flex; align-items:center; justify-content:center; text-decoration:none;">
                                <button class="shopButton1" style="width: 100%;">Update</button></a>
                        <button class="shopButton1" onclick="deleteManageProducts('<?php echo ($product_data['id']); ?>');">Delete</button>
                    </div>
                </div>
            </div>
            <!-- /product card -->

        <?php
        }

        ?>

    </div>
    <div class="footer2" style="margin-top: 5%;">
        &copy;2023 | Don Vision | All rights reserved<br />
        Powered by <a href="http://www.hendecagen.com/" style="text-decoration:none ; color:gray"><b>HENDECAGEN</b></a>
    </div>
    

    <script src="script.js"></script>
</body>

</html>