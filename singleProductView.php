<?php
require "connection.php";
if (isset($_GET["id"])) {
    $pid =  $_GET["id"];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="resources/pic10.jpg" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
        <title>Don Vision | Products</title>
    </head>

    <body>
        <div class="sProductViewDiv1">
            <?php include "header.php"; ?>
            <div class="sProductViewDiv2">
                <section class="three-d-container">
                    <?php
                    $image_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $pid . "'");
                    $image_num = $image_rs->num_rows;

                    if ($image_num == 1) {
                        $image_data = $image_rs->fetch_assoc();
                    ?>
                        <input type="radio" checked class="three-d-bullet a" name="three-d">

                        <div class="three-d-cube">
                            <figure class="three-d-item">
                                <img src="<?php echo ($image_data["code"]); ?>" alt="">
                            </figure>
                            <figure class="three-d-item">
                                <img src="products/white.JPG" alt="">
                            </figure>
                            <figure class="three-d-item">
                                <img src="products/white.JPG" alt="">
                            </figure>
                            <figure class="three-d-item">
                                <img src="products/white.JPG" alt="">
                            </figure>
                            <figure class="three-d-item">
                                <img src="products/white.JPG" alt="">
                            </figure>
                            <figure class="three-d-item">
                                <img src="products/white.JPG" alt="">
                            </figure>
                        </div>
                    <?php
                    } else if ($image_num == 2) {
                    ?>
                        <input type="radio" checked class="three-d-bullet a" name="three-d">
                        <input type="radio" class="three-d-bullet b" name="three-d">
                        <div class="three-d-cube">
                            <?php
                            for ($x = 0; $x < $image_num; $x++) {
                                $image_data = $image_rs->fetch_assoc();
                            ?>

                                <figure class="three-d-item">
                                    <img src="<?php echo ($image_data["code"]); ?>" alt="">
                                </figure>

                            <?php
                            }
                            ?>
                            <figure class="three-d-item">
                                <img src="products/white.JPG" alt="">
                            </figure>
                            <figure class="three-d-item">
                                <img src="products/white.JPG" alt="">
                            </figure>
                            <figure class="three-d-item">
                                <img src="products/white.JPG" alt="">
                            </figure>
                            <figure class="three-d-item">
                                <img src="products/white.JPG" alt="">
                            </figure>
                        </div>

                    <?php
                    } else if ($image_num == 3) {
                    ?>
                        <input type="radio" checked class="three-d-bullet a" name="three-d">
                        <input type="radio" class="three-d-bullet b" name="three-d">
                        <input type="radio" class="three-d-bullet c" name="three-d">
                        <div class="three-d-cube">
                            <?php
                            for ($y = 0; $y < $image_num; $y++) {
                                $image_data = $image_rs->fetch_assoc();
                            ?>

                                <figure class="three-d-item">
                                    <img src="<?php echo ($image_data["code"]); ?>" alt="">
                                </figure>

                            <?php
                            }
                            ?>
                            <figure class="three-d-item">
                                <img src="products/white.JPG" alt="">
                            </figure>
                            <figure class="three-d-item">
                                <img src="products/white.JPG" alt="">
                            </figure>
                            <figure class="three-d-item">
                                <img src="products/white.JPG" alt="">
                            </figure>
                        </div>

                    <?php
                    }

                    ?>
                </section>
            </div>
            <?php

            $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "'");
            $product_data = $product_rs->fetch_assoc();
            $category_rs = Database::search("SELECT * FROM `category` WHERE `id` = '" . $product_data["category_id"] . "'");
            $category_data = $category_rs->fetch_assoc();

            ?>

            <div class="p-title">
                <span class="p-name"><?php echo ($product_data["id"]); ?></span></br>
                <span class="p-name"><?php echo ($category_data["category_name"]); ?> Style</span></br>
                <span class="p-price">Rs.<?php echo ($product_data["price"]); ?> .00</span>

                <hr style="width:80%;text-align:center;margin: 10px;">

                <a href='<?php echo "checkout.php?id=" . $product_data["id"]; ?>' style="width:100%; display:flex; align-items:center; justify-content:center; text-decoration:none;">
   <button class="productViewButton1">Order Now</button></a>
            </div>

            <div class="productViewFooterDiv">
                <p class="productViewFooter1">Don Vision Opticians | 2023 | &copy;All copyrights reserved</p>
                <p class="productViewFooter1">Developed by <a href="http://www.hendecagen.com/" style="text-decoration:none ; color:gray"><b>HENDECAGEN</b></a></p>
            </div>



        </div>

        <script src="script.js"></script>
    </body>

    </html>
<?php
}
?>