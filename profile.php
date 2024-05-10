<?php
session_start();
require "connection.php";
if (isset($_SESSION["u"])) {
    $user = $_SESSION["u"];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="resources/pic10.jpg" />
     
        <title>Don Vision | Profile</title>
    </head>

    <body>
        <?php include "header.php"; ?>
        <div class="profileDiv1">

            <div class="profileDiv4">
                <div class="profileDiv5">Personal Information</div>
                <div class="profileDiv3">
                    <div class="profileDiv2">
                        <label class="profileLabel1">First Name</label>
                        <input type="text" class="profileInput1" value="<?php echo ($user["fname"]); ?>"  id="fname"/>
                    </div>
                    <div class="profileDiv2">
                        <label class="profileLabel1">Last Name</label>
                        <input type="text" class="profileInput1" value="<?php echo ($user["lname"]); ?>" id="lname"/>
                    </div>

                </div>
                <div class="profileDiv3">
                    <div class="profileDiv2">
                        <label class="profileLabel1">Mobile</label>
                        <input type="text" class="profileInput1" value="<?php echo ($user["mobile"]); ?>" disabled />
                    </div>
                    <div class="profileDiv2">
                        <label class="profileLabel1">Email</label>
                        <input type="text" class="profileInput1" value="<?php echo ($user["email"]); ?>" disabled />
                    </div>

                </div>

                <div class="profileDiv3">
                    <div class="profileDiv2">
                        <label class="profileLabel1">Password</label>
                        <input type="text" class="profileInput1" value="<?php echo ($user["password"]); ?>" disabled />
                    </div>
                    <div class="profileDiv2">
                        <label class="profileLabel1">Registered Date</label>
                        <input type="text" class="profileInput1" value="<?php echo ($user["registered_date"]); ?>" disabled />
                    </div>

                </div>
                <div class="profileDiv3">
                    <div class="profileDiv2">
                        <label class="profileLabel1">Gender</label>
                        <select class="profileInput1" id="gender">
                            <option value="0">Select your Gender</option>
                            <?php

                            $gender_rs = Database::search("SELECT * FROM `gender`");
                            $gender_num = $gender_rs->num_rows;
                            for ($g = 0; $g < $gender_num; $g++) {
                                $gender_data = $gender_rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($gender_data["id"]); ?>" <?php if ($gender_data["id"] == $user["gender_id"]) {
                                                                                    ?>selected<?php
                                                                                    } ?>><?php echo ($gender_data["gender"]); ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="profileDiv2">
                        <label class="profileLabel1">Payment Method</label>
                        <select class="profileInput1" id="payment">
                            <option value="0">Select your Payment Method</option>
                            <?php

                            $payment_rs = Database::search("SELECT * FROM `payment_method`");
                            $payment_num = $payment_rs->num_rows;
                            for ($p = 0; $p < $payment_num; $p++) {
                                $payment_data = $payment_rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($payment_data["id"]); ?>" <?php if ($payment_data["id"] == $user["payment_method_id"]) {
                                                                                        ?>selected<?php
                                                                                        } ?>><?php echo ($payment_data["payment_method"]); ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>

                </div>

                <div class="profileDiv5">Billing Information</div>
                <?php
                $address_rs = Database::search("SELECT * FROM `address` WHERE `user_mobile` = '" . $user["mobile"] . "'");
                $address_num = $address_rs->num_rows;
                if ($address_num == 0) {
                ?>
                    <div class="profileDiv3">
                        <div class="profileDiv2">
                            <label class="profileLabel1">Address Line 1</label>
                            <input type="text" class="profileInput1" id="address1" />
                        </div>
                        <div class="profileDiv2">
                            <label class="profileLabel1">Address Line 2</label>
                            <input type="text" class="profileInput1"  id="address2"/>
                        </div>

                    </div>
                    <div class="profileDiv3">
                        <div class="profileDiv2">
                            <label class="profileLabel1">City</label>
                            <input type="text" class="profileInput1"  id="city"/>
                        </div>
                        <div class="profileDiv2">
                            <label class="profileLabel1">District</label>
                            <select class="profileInput1" id="district">
                                <option value="0">Select your District</option>
                                <?php

                                $district_rs = Database::search("SELECT * FROM `district`");
                                $district_num = $district_rs->num_rows;
                                for ($d = 0; $d < $district_num; $d++) {
                                    $district_data = $district_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($district_data["id"]); ?>"><?php echo ($district_data["district"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>

                    </div>
                    <div class="profileDiv3">
                        <div class="profileDiv2">
                            <label class="profileLabel1">Province</label>
                            <select class="profileInput1" id="province">
                                <option value="0">Select your Province</option>
                                <?php

                                $province_rs = Database::search("SELECT * FROM `province`");
                                $province_num = $province_rs->num_rows;
                                for ($pr = 0; $pr < $province_num; $pr++) {
                                    $province_data = $province_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($province_data["id"]); ?>"><?php echo ($province_data["province"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="profileDiv2">
                            <label class="profileLabel1">Postal Code</label>
                            <input type="text" class="profileInput1" id="postal_code"/>
                        </div>

                    </div>

                <?php
                } else {

                    $address_data = $address_rs->fetch_assoc();
                    $city_rs = Database::search("SELECT * FROM `city` WHERE `id` = '".$address_data["city_id"]."'");
                    $city_data = $city_rs->fetch_assoc();
                    $district_rs1 = Database::search("SELECT * FROM `district` WHERE `id` = '".$city_data["district_id"]."'");
                    $district_data1 = $district_rs1->fetch_assoc();
                    $province_rs1 = Database::search("SELECT * FROM `province` WHERE `id` = '".$district_data1["province_id"]."'");
                    $province_data1 = $province_rs1->fetch_assoc();
               
                ?>
                    <div class="profileDiv3">
                        <div class="profileDiv2">
                            <label class="profileLabel1">Address Line 1</label>
                            <input type="text" class="profileInput1"  value="<?php echo($address_data["address_line1"]); ?>" id="address1"/>
                        </div>
                        <div class="profileDiv2">
                            <label class="profileLabel1">Address Line 2</label>
                            <input type="text" class="profileInput1" value="<?php echo($address_data["address_line2"]); ?>"  id="address2"/>
                        </div>

                    </div>
                    <div class="profileDiv3">
                        <div class="profileDiv2">
                            <label class="profileLabel1">City</label>
                            <input type="text" class="profileInput1" value="<?php echo($city_data["city"]); ?>" id="city"/>
                        </div>
                        <div class="profileDiv2">
                            <label class="profileLabel1">District</label>
                            <select class="profileInput1" id="district">
                                <option value="0">Select your District</option>
                                <?php

                                $district_rs = Database::search("SELECT * FROM `district`");
                                $district_num = $district_rs->num_rows;
                                for ($d = 0; $d < $district_num; $d++) {
                                    $district_data = $district_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($district_data["id"]); ?>" <?php if($district_data["id"] == $district_data1["id"]){ ?> selected <?php } ?>><?php echo ($district_data["district"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>

                    </div>
                    <div class="profileDiv3">
                        <div class="profileDiv2">
                            <label class="profileLabel1">Province</label>
                            <select class="profileInput1" id="province">
                                <option value="0">Select your Province</option>
                                <?php

                                $province_rs = Database::search("SELECT * FROM `province`");
                                $province_num = $province_rs->num_rows;
                                for ($pr = 0; $pr < $province_num; $pr++) {
                                    $province_data = $province_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($province_data["id"]); ?>" <?php if($province_data["id"] == $province_data1["id"]){ ?> selected <?php } ?>><?php echo ($province_data["province"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="profileDiv2">
                            <label class="profileLabel1">Postal Code</label>
                            <input type="text" class="profileInput1" value="<?php echo($address_data["postal_code"]); ?>" id="postal_code"/>
                        </div>

                    </div>
                <?php
                }
                ?>
                <div class="profileDiv6">
                    <button class="profileButton1" onclick="updateProfile();">Submit</button>
                </div>

            </div>

            <div class="footer">
               <span>Don Vision Opticians | 2023 | ©All copyrights reserved</span>
               <span><b>Developed by <a href="http://www.hendecagen.com/" style="text-decoration:none ; color:gray">HENDECAGON</a> </b></span>
          </div>




        </div>
        <script src="script.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location: signIn.php");
}
?>