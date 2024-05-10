<?php
require "connection.php";

session_start();
$user = $_SESSION["u"];

$cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_mobile` = '" . $user["mobile"] . "'");
$cart_num = $cart_rs->num_rows;

for ($c = 0; $c < $cart_num; $c++) {
    $cart_data = $cart_rs->fetch_assoc();
    $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cart_data["product_id"] . "'");
    $product_data = $product_rs->fetch_assoc();
    $image_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $cart_data["product_id"] . "'");
    $image_data = $image_rs->fetch_assoc();
   
?>

    <div class="checkoutDiv16">
        <img src="<?php echo ($image_data["code"]); ?>" style="height: 90px;margin-left:10px;" />
        <div class="checkoutDiv17">
            <label class="checkoutLabel8" id="title"><?php echo ($cart_data["product_id"]); ?></label>
            <div>
                <label>Quantity :</label>
                <input class="checkoutInput2" type="number" value="1" id="qty" onchange="qtyChecker();" />
            </div>

        </div>
    </div>







<?php
}


?>