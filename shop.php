<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/pic10.jpg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <title>Don Vision | Shop</title>
</head>

<body>
    <?php
    session_start();
   
    require "header.php";
    ?>

    <div class="body">
        <div class="shopHeading">
            <h2>Shop</h2>
        </div>
        <div class="shopDiv1">
            <input type="text" class="shopInput1" placeholder="Search" id="searchText" />
            <i class="bi bi-search shopIcon1" onclick="basicSearch();"></i>
        </div>
    </div>
    <div class="shopSearchBody1" id="shopSearchBody"></div>
    <!-- <div class="shopDiv0"> -->
    <?php
    require "connection.php";
    $category_rs = Database::search("SELECT * FROM `category`");
    $category_num = $category_rs->num_rows;
    for ($x = 0; $x < $category_num; $x++) {
        $category_data = $category_rs->fetch_assoc();
    ?>
        <hr />
        <div class="shopDiv2"><?php echo ($category_data["category_name"]); ?></div>
        <hr />
        <!-- category -->
        <div class="shopDiv3">

            <?php
            $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id` = '" . $category_data["id"] . "'");
            $product_num = $product_rs->num_rows;
            for ($y = 0; $y < $product_num; $y++) {
                $product_data = $product_rs->fetch_assoc();
                $image_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $product_data["id"] . "'");
                $image_data = $image_rs->fetch_assoc();
            ?>
                <!-- product card -->
                <div class="shopDiv4">
                    <div class="shopDiv5">
                        <img src="<?php echo ($image_data["code"]); ?>" class="shopProduct1" />
                    </div>
                    <hr />
                    <div class="shopDiv6">
                        <span class="shopProductTitle"><?php echo ($product_data["id"]); ?></span>
                        <span class="shopProductPrice">Rs. <?php echo ($product_data["price"]); ?> .00</span>
                        <div style="width: 100%; display:flex; flex-direction:column; align-items:center; justify-content:center;gap:10px;"> 
                            <a href='<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>' class="shopButtona1" style="">
                                <button class="shopButton1">Order Now</button>
                            </a>
                            <?php
                            if(isset($_SESSION["u"])){
                                $user = $_SESSION["u"];
                                $favourite_rs = Database::search("SELECT * FROM `favourite` WHERE `product_id` = '" . $product_data["id"] . "' AND `user_mobile` = '" . $user["mobile"] . "'");
                                $favourite_num = $favourite_rs->num_rows;
                                if ($favourite_num == 0) {
                                ?>
                                    <button class="shopButton2i"  onclick="addFavourite('<?php echo ($product_data['id']); ?>');">Add to Favourite</button>
                                    <!-- <button class="shopHeartButton1"  onclick="addFavourite('<?php echo ($product_data['id']); ?>');"><i class="bi bi-heart" style="font-size: 20px;"></i></button> -->
    
                                <?php
                                } else {
                                ?>
                                    <button class="shopButton2ii" onclick="addFavourite('<?php echo ($product_data['id']); ?>');">Added to Favourite</button>
                                    <!-- <button class="shopHeartButton1"  onclick="addFavourite('<?php echo ($product_data['id']); ?>');"><i class="bi bi-heart-fill" style="font-size: 20px; color:red;"></i></button> -->
                                <?php
                                }
                               
                            }else{
                                ?>
                                  <button class="shopButton2i"  onclick="window.location = 'signIn.php'">Add to Favourite</button>

                                <!-- <button style="border: none;background-color:transparent;" onclick="window.location = 'signIn.php';"><i class="bi bi-heart" style="font-size: 20px;"></i></button> -->
    
  <?php
                            }
                            ?>
 <?php
                            if(isset($_SESSION["u"])){
                                $user = $_SESSION["u"];
                                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id` = '" . $product_data["id"] . "' AND `user_mobile` = '" . $user["mobile"] . "'");
                                $cart_num = $cart_rs->num_rows;
                                if ($cart_num == 0) {
                                ?>
                                    <button class="shopButton3i"  onclick="addCart('<?php echo ($product_data['id']); ?>');">Add to Cart</button>
                                    <!-- <button class="shopHeartButton1"  onclick="addFavourite('<?php echo ($product_data['id']); ?>');"><i class="bi bi-heart" style="font-size: 20px;"></i></button> -->
    
                                <?php
                                } else {
                                ?>
                                    <button class="shopButton3ii" onclick="addCart('<?php echo ($product_data['id']); ?>');">Added to Cart</button>
                                    <!-- <button class="shopHeartButton1"  onclick="addFavourite('<?php echo ($product_data['id']); ?>');"><i class="bi bi-heart-fill" style="font-size: 20px; color:red;"></i></button> -->
                                <?php
                                }
                               
                            }else{
                                ?>
                                  <button class="shopButton3i"  onclick="window.location = 'signIn.php'">Add to Cart</button>

                                <!-- <button style="border: none;background-color:transparent;" onclick="window.location = 'signIn.php';"><i class="bi bi-heart" style="font-size: 20px;"></i></button> -->
    
  <?php
                            }
                            ?>
                           
                           
                        </div>
                    </div>
                </div>
                <!-- /product card -->

            <?php
            }
            ?>
        </div>
       
        <!-- /category -->

    <?php
    }


    ?>


    <hr />
    <div class="footer">
        <a href="admin.php" style="text-decoration: none; color:gray; font-weight:bold; font-size:15px;">Admin Login</a>
        <span>Don Vision Opticians | 2023 | ©All copyrights reserved</span>
        <span><b>Developed by <a href="http://www.hendecagen.com/" style="text-decoration:none ; color:gray">HENDECAGON</a> </b></span>

    </div>

    <script src="script.js"></script>
</body>

</html>