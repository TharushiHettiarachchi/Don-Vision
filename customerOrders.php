<?php
require "connection.php";
session_start();
$user = $_SESSION["u"];
?>

<!DOCTYPE html>
<html lang="en">
<!-- oder id  -->
<!-- order title -->
<!-- product id
date time
price 
qty
action -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/pic10.jpg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <title>Don Vision | Checkout</title>
</head>

<body>
    <?php include "header.php"; ?>
    <div class="customerOdersDiv1" style="overflow-y: scroll; height:80vh;">
        <div class="customerOdersDiv2">My Orders</div>
        <hr>
        <div class="customerOdersDiv3">
            <label class="customerOdersLabel1">Order ID</label>
            <label class="customerOdersLabel1">Product ID</label>
            <label class="customerOdersLabel1">Date Time</label>
            <label class="customerOdersLabel1">Quantity</label>
            <label class="customerOdersLabel1">Price</label>
            <label class="customerOdersLabel1">Action</label>
        </div>
        <hr>

        <?php
        $order_rs = Database::search("SELECT * FROM `order_details` WHERE `user_mobile` = '" . $user["mobile"] . "'");
        $order_num = $order_rs->num_rows;

        for ($o = 0; $o < $order_num; $o++) {
            $order_data = $order_rs->fetch_assoc();

            $product_rs = Database::search("SELECT * FROM `orders` WHERE `order_id` = '" . $order_data["order_id"] . "'");
            $product_num = $product_rs->num_rows;
            if ($product_num == 1) {
                for ($p = 0; $p < $product_num; $p++) {
                    $product_data = $product_rs->fetch_assoc();
        ?>
                    <div class="customerOdersDiv4">
                        <label class="customerOdersLabel2"><?php echo ($order_data["order_id"]); ?></label>
                        <a href='<?php echo "singleProductView.php?id=" . $product_data["product_id"]; ?>' style="width:16.66%; text-decoration: none; text-align: center; color:black;"> <label class="customerOdersLabel3"><?php echo ($product_data["product_id"]); ?></label></a>
                        <label class="customerOdersLabel2"><?php echo ($order_data["date_time"]); ?></label>
                        <label class="customerOdersLabel2"><?php echo ($product_data["qty"]); ?></label>
                        <label class="customerOdersLabel2"><?php echo ($order_data["total"]); ?></label>
                        <!-- <label class="customerOdersLabel5" id="dropdown">
                            <select>
                                <option><i class="bi bi-three-dots-vertical" style="font-size: 20px;;"></i></option>
                                <option>Cancel Order</option>
                                <option>Refund</option>
                            </select>
                        </label> -->
                        <label class="customerOdersLabel4" id="icon"> <i class="bi bi-trash3" style="color: red;" onclick="deleteOrder('<?php echo ($order_data['order_id']); ?>','<?php echo ($product_data['product_id']); ?>');"></i></label>

                    </div>
                    <hr>

                <?php
                }
            } else {
                for ($p = 0; $p < $product_num; $p++) {
                    $product_data = $product_rs->fetch_assoc();
                ?>
                    <div class="customerOdersDiv4">
                        <label class="customerOdersLabel2"><?php echo ($order_data["order_id"]); ?></label>
                        <a href='<?php echo "singleProductView.php?id=" . $product_data["product_id"]; ?>' style="width:16.66%; text-decoration: none; text-align: center; color:black;"> <label class="customerOdersLabel3"><?php echo ($product_data["product_id"]); ?></label></a>
                        <label class="customerOdersLabel2"><?php echo ($order_data["date_time"]); ?></label>
                        <label class="customerOdersLabel2"><?php echo ($product_data["qty"]); ?></label>
                        <label class="customerOdersLabel2"><?php echo ($order_data["total"]); ?></label>
                        <label class="customerOdersLabel2"><i class="bi bi-trash3" style="color: red;" onclick="deleteOrder('<?php echo ($order_data['order_id']); ?>','<?php echo ($product_data['product_id']); ?>');"></i></label>

                    </div>
                    <hr>

        <?php
                }
            }
        }

        ?>
    </div>




    <div class="aboutDiv4" style="position:fixed;">
        Don Vision Opticians | 2023 | &copy;All copyrights reserved<br>Developed By <a href="http://www.hendecagen.com/" style="text-decoration:none ; color:gray"><b>HENDECAGON</b></a>
    </div>
    <script src="script.js"></script>
</body>

</html>