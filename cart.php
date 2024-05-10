<?php
session_start();
require "connection.php";


if(isset($_SESSION["u"])){
    $user = $_SESSION["u"];
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
    <title>Don Vision | Cart</title>
</head>

<body>
    <?php
    require "header.php";
    ?>
    <div class="cartDiv1">Cart</div>
    <div class="cartDiv2">
        <div class="cartDiv3">

            <?php
            $product_rs = Database::search("SELECT * FROM `cart` WHERE `user_mobile` = '" . $user["mobile"] . "'");
            $product_num = $product_rs->num_rows;
            if ($product_num == 0) {
            ?>
                <div style="width:100%; text-align:center; font-size:30px; font-weight:bold;height:50vh;display:flex; justify-content:center; align-items:center;">You have not add any products to the Cart yet.</div>
                <?php
            } else {
                for ($p = 0; $p < $product_num; $p++) {
                    $product_data = $product_rs->fetch_assoc();
                    $product_rs1 = Database::search("SELECT * FROM `product` WHERE `id` = '" . $product_data["product_id"] . "'");
                    $product_data1 = $product_rs1->fetch_assoc();
                    $image_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $product_data["product_id"] . "'");
                    $image_data = $image_rs->fetch_assoc();

                ?>
                    <!-- product card -->
                    <div class="cartDiv8">
                        <div class="shopDiv5">
                            <img src="<?php echo ($image_data["code"]); ?>" class="shopProduct1" />
                        </div>
                        <hr />
                        <div class="shopDiv6">
                            <span class="shopProductTitle"><?php echo ($product_data1["id"]); ?></span>
                            <span class="shopProductPrice">Rs. <?php echo ($product_data1["price"]); ?> .00</span>
                            <div style="display:flex; width:100%;margin-top:8%; flex-direction:column; width:100%; align-items:center; justify-content:center; gap:10px;">
                                <a href='<?php echo "singleProductView.php?id=" . $product_data1["id"]; ?>' style="width:100%; display:flex; align-items:center; justify-content:center; text-decoration:none;">
                                    <button class="shopButton1">Order Now</button>
                                </a>
                                <?php
                                $favourite_rs = Database::search("SELECT * FROM `favourite` WHERE `product_id` = '" . $product_data1["id"] . "' AND `user_mobile` = '" . $user["mobile"] . "'");
                                $favourite_num = $favourite_rs->num_rows;
                                if ($favourite_num == 0) {
                                ?>
                                    <button class="shopButton2i" onclick="addFavourite('<?php echo ($product_data1['id']); ?>');">Add to Favourite</button>

                                <?php
                                } else {
                                ?>
                                    <button class="shopButton2ii" onclick="addFavourite('<?php echo ($product_data1['id']); ?>');">Added to Favourite</button>
                                <?php
                                }

                                ?>
                                <?php
                                if (isset($_SESSION["u"])) {
                                    $user = $_SESSION["u"];
                                    $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id` = '" . $product_data1["id"] . "' AND `user_mobile` = '" . $user["mobile"] . "'");
                                    $cart_num = $cart_rs->num_rows;
                                    if ($cart_num == 0) {
                                ?>
                                        <button class="shopButton3i" onclick="addCart('<?php echo ($product_data1['id']); ?>');">Add to Cart</button>
                                        <!-- <button class="shopHeartButton1"  onclick="addFavourite('<?php echo ($product_data['id']); ?>');"><i class="bi bi-heart" style="font-size: 20px;"></i></button> -->

                                    <?php
                                    } else {
                                    ?>
                                        <button class="shopButton3ii" onclick="addCart('<?php echo ($product_data1['id']); ?>');">Added to Cart</button>
                                        <!-- <button class="shopHeartButton1"  onclick="addFavourite('<?php echo ($product_data['id']); ?>');"><i class="bi bi-heart-fill" style="font-size: 20px; color:red;"></i></button> -->
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <button class="shopButton3i" onclick="window.location = 'signIn.php'">Add to Cart</button>

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
            }
            ?>

        </div>


        <div class="cartDiv4">
            <div class="cartDiv5">
                <div class="cartDiv6">Summary</div>
                <?php
                $product_rs2 = Database::search("SELECT * FROM `cart` WHERE `user_mobile` = '" . $user["mobile"] . "'");
                $product_num2 = $product_rs->num_rows;
                $tot = 0;
                for ($f = 0; $f < $product_num2; $f++) {
                    $product_data2 = $product_rs2->fetch_assoc();

                    $product_rs3 = Database::search("SELECT * FROM `product` WHERE `id` = '" . $product_data2["product_id"] . "'");
                    $product_data3 = $product_rs3->fetch_assoc();
                    $tot = $tot + $product_data3["price"];

                ?>
                    <div class="cartDiv9">
                        <div class="cartDiv10"><?php echo ($product_data3["id"]); ?></div>
                        <div class="cartDiv11">Rs.<?php echo ($product_data3["price"]); ?> .00</div>
                    </div>

                <?php
                }

                ?>
                <hr/>
                <div class="cartDiv9">
                    <div class="cartDiv10" style="font-weight:bold; font-size:18px;">Sub Total</div>
                    <div class="cartDiv11" style="font-weight:bold; font-size:18px;">Rs.<?php echo ($tot); ?> .00</div>
                </div>

                <div class="cartDiv7"></div>

            </div>
            <div class="cartDiv12">
            <a href="checkout.php?id=cart" style="width: 100%; display:flex; align-items:center; justify-content:center;"><button class="cartButton1" onclick="">Place Order</button></a>
            </div>
            <div class="cartDiv12">
            <button class="cartButton1" onclick="window.location = 'customerOrders.php';">View my Orders</button>
            </div>
           
        </div>
    </div>









    <script src="script.js"></script>
</body>

</html>
    <?php
}else{
    header("Location: signIn.php");
}
?>
