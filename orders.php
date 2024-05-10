<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Don Vision | Orders</title>
    <link rel="icon" href="resources/pic10.jpg" />
</head>

<body class="adpBody1">
    <?php include "connection.php"; ?>
    <?php include "adminHeader.php" ?>
    <div class="manageProductDiv1">Orders</div>
    <div class="ordersDiv3">
        <div class="ordersDiv2">Prescription</div>
        <div class="ordersDiv2">Date & Time</div>
        <div class="ordersDiv2">Order ID</div>
        <div class="ordersDiv2">Product</div>
        <div class="ordersDiv2">Customer</div>
        <div class="ordersDiv2">BC</div>
        <div class="ordersDiv2">UV</div>
        <div class="ordersDiv2">Qty</div>
        <div class="ordersDiv2">Total Price</div>
        <div class="ordersDiv2"></div>
    </div>
    <?php
    $order_rs = Database::search("SELECT * FROM `order_details`");
    $order_num = $order_rs->num_rows;

    for ($o = 0; $o < $order_num; $o++) {
        $order_data = $order_rs->fetch_assoc();

        $product_rs = Database::search("SELECT * FROM `orders` WHERE `order_id` = '" . $order_data["order_id"] . "'");
        $product_num = $product_rs->num_rows;
        $customer_rs = Database::search("SELECT * FROM `user` WHERE `mobile` = '" . $order_data["user_mobile"] . "'");
        $customer_data = $customer_rs->fetch_assoc();

        for ($p = 0; $p < $product_num; $p++) {
            $product_data = $product_rs->fetch_assoc();
    ?>
            <div class="ordersDiv1">
                <?php
                if ($product_data["lens"] == 1) {
                ?>
                    <div class="ordersDiv2"><a href='<?php echo ($customer_data["prescription"]) ?>'><img src="resources/file.png" style="height:30px;" /></a></div>
                <?php
                } else {
                ?>
                    <div class="ordersDiv2">-</div>
                <?php
                }
                ?>

                <div class="ordersDiv2"><?php echo ($order_data["date_time"]) ?></div>
                <div class="ordersDiv2"><?php echo ($order_data["order_id"]) ?></div>
                <div class="ordersDiv2"><?php echo ($product_data["product_id"]) ?></div>
                <div class="ordersDiv2"><?php echo ($customer_data["fname"] . " " . $customer_data["lname"]); ?></div>
                <div class="ordersDiv2"><input type="radio" disabled <?php if ($product_data["blue_cut"] == 1) { ?> checked <?php } ?> /></div>
                <div class="ordersDiv2"><input type="radio" disabled <?php if ($product_data["uv_protection"] == 1) { ?> checked <?php } ?> /></div>

                <div class="ordersDiv2"><?php echo ($product_data["qty"]) ?></div>
                <div class="ordersDiv2"><?php echo ($order_data["total"]) ?>.00</div>
                <div class="ordersDiv2"><button class="orderButton1">Approve Order</button></div>
            </div>

    <?php
        }
    }

    ?>



    <script src="script.js"></script>
</body>

</html>