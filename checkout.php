<?php
session_start();
require "connection.php";
if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"];
    $place_rs = Database::search("SELECT * FROM `address` WHERE `user_mobile` = '" . $user["mobile"] . "'");
    $place_num = $place_rs->num_rows;
    if ($place_num  == 1) {
        $id = $_GET["id"];

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
            <title>Don Vision | Checkout</title>
        </head>

        <body class="checkoutBody" onload="summarySum();">
            <?php require "header.php"; ?>


            <div class="checkoutDiv1">
                <div class="checkoutDiv2">
                    <div class="checkoutMain">
                        <div style="width: 100%;" id="productDiv">
                            <?php
                            if ($id == "cart") {
                                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_mobile` = '" . $user["mobile"] . "'");
                                $cart_num = $cart_rs->num_rows;
                                $frame = 0;
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
                                                <?php
                                                if (isset($cart_data["qty"])) {
                                                ?>
                                                    <input class="checkoutInput2" type="number" value="<?php echo ($cart_data["qty"]); ?>" id="qty<?php echo ($cart_data['product_id']); ?>" onchange="qtyChecker1('<?php echo ($cart_data['product_id']); ?>');" />
                                                <?php
                                                } else {
                                                ?>
                                                    <input class="checkoutInput2" type="number" value="1" id="qty<?php echo ($cart_data['product_id']); ?>" onchange="qtyChecker1('<?php echo ($cart_data['product_id']); ?>');" />
                                                    <?php

                                                    ?>
                                                <?php
                                                }

                                                ?>
                                            </div>

                                        </div>
                                    </div>







                                <?php
                                    if (isset($cart_data["qty"])) {
                                        $frame = $frame + ($product_data["price"] *  $cart_data["qty"]);
                                    } else {
                                        $frame = $frame + ($product_data["price"] *  1);
                                    }
                                }
                            } else {
                                ?>
                                <div class="checkoutDiv16">
                                    <?php
                                    $image_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $id . "'");
                                    $image_data = $image_rs->fetch_assoc();
                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");
                                    $product_data = $product_rs->fetch_assoc();

                                    ?>
                                    <img src="<?php echo ($image_data["code"]); ?>" style="height: 90px;margin-left:10px;" />
                                    <div class="checkoutDiv17">
                                        <label class="checkoutLabel8" id="title"><?php echo ($id); ?></label>
                                        <div>
                                            <label>Quantity :</label>
                                            <input class="checkoutInput2" type="number" value="1" id="qty" onchange="qtyChecker();" />
                                        </div>

                                    </div>
                                </div>
                            <?php
                            }


                            ?>

                        </div>
                        <div class="checkoutDiv8">Billing Details</div>
                        <div class="checkoutDiv9">
                            <div class="checkoutDiv10">
                                <label class="">First Name</label>
                                <input class="checkoutInput1" type="text" value="<?php echo ($user["fname"]); ?>" />
                            </div>
                            <div class="checkoutDiv10">
                                <label class="">Last Name</label>
                                <input class="checkoutInput1" type="text" value="<?php echo ($user["lname"]); ?>" />
                            </div>

                        </div>
                        <?php
                        $address_rs = Database::search("SELECT * FROM `address` WHERE `user_mobile` = '" . $user["mobile"] . "'");
                        $address_data = $address_rs->fetch_assoc();
                        $city_rs = Database::search("SELECT * FROM `city` WHERE `id` = '" . $address_data["city_id"] . "'");
                        $city_data = $city_rs->fetch_assoc();
                        $district_rs = Database::search("SELECT * FROM `district` WHERE `id` = '" . $city_data["district_id"] . "'");
                        $district_data = $district_rs->fetch_assoc();
                        ?>
                        <div class="checkoutDiv9">
                            <div class="checkoutDiv10">
                                <label class="">Address Line 1</label>
                                <input class="checkoutInput1" type="text" value="<?php echo ($address_data["address_line1"]); ?>" />
                            </div>
                            <div class="checkoutDiv10">
                                <label class="">Address Line 2</label>
                                <input class="checkoutInput1" type="text" value="<?php echo ($address_data["address_line2"]); ?>" />
                            </div>

                        </div>
                        <div class="checkoutDiv9">
                            <div class="checkoutDiv10">
                                <label class="">City</label>
                                <input class="checkoutInput1" type="text" value="<?php echo ($city_data["city"]); ?>" />
                            </div>
                            <div class="checkoutDiv10">
                                <label class="">District</label>
                                <input class="checkoutInput1" type="text" value="<?php echo ($district_data["district"]); ?>" />
                            </div>

                        </div>
                        <div class="checkoutDiv11">Product Requirements</div>
                        <div class="checkoutDiv9">
                            <div class="checkoutDiv12">
                                <input type="radio" name="selectPrescription" checked onclick="prescriptionView2();" />
                                <label class="checkoutLabel7">No Prescription</label>
                            </div>
                            <?php

                            if ($id == "cart") {
                            ?>
                                <div class="checkoutDiv12">
                                    <input type="radio" id="havePrescription" name="selectPrescription" onclick="prescriptionView3();" />
                                    <label class="checkoutLabel7">Upload Prescription</label>
                                </div>

                            <?php
                            } else {
                            ?>
                                <div class="checkoutDiv12">
                                    <input type="radio" id="havePrescription" name="selectPrescription" onclick="prescriptionView1();" />
                                    <label class="checkoutLabel7">Upload Prescription</label>
                                </div>

                            <?php
                            }



                            ?>

                        </div>
                        <?php
                        if (isset($user["prescription"])) {

                        ?>
                            <div class="checkoutDiv13" id="prescriptionBody">
                                <div class="checkoutDiv14" id="prescriptionImage" style="background-image: url(<?php echo ($user["prescription"]); ?>);"></div>
                                <div class="checkoutDiv15">
                                    <input type="file" style="display: none;" id="uploadPrescription" />
                                    <label class="checkoutButton1" for="uploadPrescription" style="text-align: center;" onclick="addPrescriptionImage();">Upload Prescription</label>
                                </div>
                            </div>

                        <?php
                        } else {

                        ?>
                            <div class="checkoutDiv13" id="prescriptionBody">
                                <div class="checkoutDiv14" id="prescriptionImage">Uploaded Prescription will be displayed here</div>
                                <div class="checkoutDiv15">
                                    <input type="file" style="display: none;" id="uploadPrescription" />
                                    <label class="checkoutButton1" for="uploadPrescription" style="text-align: center;" onclick="addPrescriptionImage();">Upload Prescription</label>
                                </div>
                            </div>

                        <?php
                        }

                        ?>
                        <?php

                        if ($id == "cart") {
                        ?>
                            <div class="checkoutDiv9">
                                <div class="checkoutDiv12">
                                    <input type="checkbox" name="selectPrescription" id="blueCutCheck" onclick="BlueCutPrice1();" />
                                    <label class="checkoutLabel7">Blue Cut</label>
                                </div>
                                <div class="checkoutDiv12">
                                    <input type="checkbox" name="selectPrescription" id="uvCheck" onclick="UVPrice1();" />
                                    <label class="checkoutLabel7">UV Protection</label>
                                </div>

                            </div>

                        <?php
                        } else {
                        ?>
                            <div class="checkoutDiv9">
                                <div class="checkoutDiv12">
                                    <input type="checkbox" name="selectPrescription" id="blueCutCheck" onclick="BlueCutPrice();" />
                                    <label class="checkoutLabel7">Blue Cut</label>
                                </div>
                                <div class="checkoutDiv12">
                                    <input type="checkbox" name="selectPrescription" id="uvCheck" onclick="UVPrice();" />
                                    <label class="checkoutLabel7">UV Protection</label>
                                </div>

                            </div>

                        <?php
                        }

                        ?>

                    </div>

                </div>
                <!-- <div class="checkoutDiv7"></div> -->
                <div class="checkoutDiv3">
                    <div class="checkoutDiv4">
                        <?php
                        if ($id != "cart") {
                            $frame = $product_data["price"];
                        }

                        ?>
                        <div class="checkoutDiv6">Order Summary</div>
                        <div class="checkoutDiv5">
                            <label class="checkoutLabel1">Frame</label>
                            <div class="checkoutLabel2" value="0"><label>Rs. </label><label id="frame"><?php echo ($frame); ?>.00</label></div>
                        </div>
                        <div class="checkoutDiv5">
                            <label class="checkoutLabel1">Lens</label>
                            <div class="checkoutLabel2"><label>Rs. </label><label id="lens"> 00.00</label></div>
                        </div>
                        <div class="checkoutDiv5">
                            <label class="checkoutLabel1">Blue Cut</label>
                            <div class="checkoutLabel2"><label>Rs. </label><label id="blueCut"> 00.00</label></div>
                        </div>
                        <div class="checkoutDiv5">
                            <label class="checkoutLabel1">UV Protection</label>
                            <div class="checkoutLabel2"><label>Rs. </label><label id="uv"> 00.00</label></div>
                        </div>
                        <div style="width: 100%; display:flex; align-items:center; justify-content:center;">
                            <hr style="width:95%;" />
                        </div>

                        <div class="checkoutDiv5">
                            <label class="checkoutLabel3">Sub Total</label>
                            <div class="checkoutLabel4"><label>Rs.</label><label id="subTotal"> 00 .00</label></div>
                        </div>
                        <div class="checkoutDiv5">
                            <label class="checkoutLabel1">Discount</label>
                            <div class="checkoutLabel2"><label>Rs.</label><label id="discount"> 00 .00</label></div>
                        </div>
                        <div class="checkoutDiv5">
                            <label class="checkoutLabel5">Grand Total</label>
                            <div class="checkoutLabel6"><label>Rs.</label><label id="grandTotal"> 00 .00</label></div>
                        </div>


                    </div>
                    <?php

if($id == "cart"){
    ?>
 <div style="display:flex; align-items:center; justify-content:center; width:100%; padding-top:20px;"><button class="checkoutButton1" onclick="placeOrder1();">Place Order</button></div>
    <?php
}else{
    ?>
 <div style="display:flex; align-items:center; justify-content:center; width:100%; padding-top:20px;"><button class="checkoutButton1" onclick="placeOrder();">Place Order</button></div>
    <?php
}
?>
                   
                </div>
            </div>
            <div class="productViewFooterDiv">
                <p class="productViewFooter1">Don Vision Opticians | 2023 | &copy;All copyrights reserved</p>
                <p class="productViewFooter1">Developed by <a href="http://www.hendecagen.com/" style="text-decoration:none ; color:gray"><b>HENDECAGEN</b></a></p>
            </div>



            <script src="script.js"></script>
        </body>

        </html>
    <?php
    } else {
        header("Location: profile.php");
    }

    ?>

<?php
} else {
    header("Location: signIn.php");
}

?>