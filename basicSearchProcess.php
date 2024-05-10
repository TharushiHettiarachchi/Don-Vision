<?php

require "connection.php";
session_start();

$searchText = $_POST["searchText"];

$result_rs = Database::search("SELECT * FROM `product` WHERE `id` LIKE '%" . $searchText . "%'");
$result_num = $result_rs->num_rows;
if ($result_num == 0) {
    echo ("No results Found");
} else {
?>
    <div style="width:100%; font-size:20px; font-weight:bold; text-align:center;"><?php echo ($result_num); ?> Products Found</div>
    <div class="shopSearchBody">
        <?php
        for ($r = 0; $r < $result_num; $r++) {
            $result_data = $result_rs->fetch_assoc();
            $image_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $result_data["id"] . "'");
            $image_data = $image_rs->fetch_assoc();

        ?>
            <!-- product card -->
            <div class="shopDiv4">
                <div class="shopDiv5">
                    <img src="<?php echo ($image_data["code"]); ?>" class="shopProduct1" />
                </div>
                <hr />
                <div class="shopDiv6">
                    <span class="shopProductTitle"><?php echo ($result_data["id"]); ?></span>
                    <span class="shopProductPrice">Rs. <?php echo ($result_data["price"]); ?> .00</span>
                    <div style="width: 100%; display:flex; flex-direction:column; align-items:center; justify-content:center;gap:10px;">
                        <a href='<?php echo "singleProductView.php?id=" . $result_data["id"]; ?>' style="width:100%; display:flex; align-items:center; justify-content:center; text-decoration:none;">
                            <button class="shopButton1">Order Now</button>
                        </a>
                        <?php
                        if (isset($_SESSION["u"])) {
                            $user = $_SESSION["u"];
                            $favourite_rs = Database::search("SELECT * FROM `favourite` WHERE `product_id` = '" . $result_data["id"] . "' AND `user_mobile` = '" . $user["mobile"] . "'");
                            $favourite_num = $favourite_rs->num_rows;
                            if ($favourite_num == 0) {
                        ?>
                                <button class="shopButton2i"  onclick="addFavourite('<?php echo ($result_data['id']); ?>');">Add to Favourite</button>
                                    <!-- <button class="shopHeartButton1"  onclick="addFavourite('<?php echo ($product_data['id']); ?>');"><i class="bi bi-heart" style="font-size: 20px;"></i></button> -->
    
                                <?php
                                } else {
                                ?>
                                    <button class="shopButton2ii" onclick="addFavourite('<?php echo ($result_data['id']); ?>');">Added to Favourite</button>
                                    <!-- <button class="shopHeartButton1"  onclick="addFavourite('<?php echo ($product_data['id']); ?>');"><i class="bi bi-heart-fill" style="font-size: 20px; color:red;"></i></button> -->
                             <?php
                            }
                        } else {
                            ?>
                            <button style="border: none;background-color:transparent;" onclick="window.location = 'signIn.php';"><i class="bi bi-heart" style="font-size: 20px;"></i></button>

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
<?php
}
















?>