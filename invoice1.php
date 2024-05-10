<?php
include "connection.php";
if(isset($_GET["id"])){
$o_id = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Don Vision | Orders</title>
    <link rel="icon" href="resources/pic10.jpg" />
</head>

<body>
    <?php
$details_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '".$o_id."'");
$details_data = $details_rs->fetch_assoc();


?>
    <div class="invoiceDiv0">
        <button onclick="printInvoice();" style="width:5%; background-color: blue; color:white;">print</button>
    </div>
    <div class="invoiceDiv1" id="page">
        <div class="invoiceDiv2">
            <div class="invoiceDiv3">
                <div class="invoiceDiv6"> <img src="resources/logo.jpg" style="height:75px;" /></div>
                <div class="invoiceDiv7">No. 176/A, Colombo Rd, Gampaha. Reg No. WN 6833</div>
            </div>
            <div class="invoiceDiv4">Tel :</div>
            <div class="invoiceDiv5">
                <label class="invoiceLabel1">0333120885</label>
                <label class="invoiceLabel1">0333120885</label>
                <label class="invoiceLabel1">0776906692</label>
            </div>

        </div>
        <div class="invoiceDiv8">
            <div class="invoiceDiv9">
                <div class="invoiceDiv10"><i class="bi bi-envelope"></i></div>
                <div class="invoiceDiv11">donvision1@gmail.com</div>
            </div>

            <div class="invoiceDiv9">
                <div class="invoiceDiv10"><i class="bi bi-facebook"></i></div>
                <div class="invoiceDiv11">don vision gampaha</div>
            </div>
            <div class="invoiceDiv9">
                <div class="invoiceDiv10"><i class="bi bi-geo-alt"></i></div>
                <div class="invoiceDiv11">don vision gampaha</div>
            </div>

        </div>
        <hr />
        <div class="invoiceDiv12">
            <div class="invoiceDiv13">
                <label class="invoiceLabel2">Order Date</label>
                <input type="text" class="invoiceInput1" id="order_date" value="<?php echo($details_data["order_date"]); ?>"/>
            </div>
            <div class="invoiceDiv13">
                <label class="invoiceLabel2">Order ID</label>
                <input type="text" class="invoiceInput1" id="order_id" value="<?php echo($o_id); ?>"/>
            </div>
        </div>
        <div class="invoiceDiv12">
            <div class="invoiceDiv14">
                <label class="invoiceLabel3">Customer Name</label>
                <input type="text" class="invoiceInput2" id="name" value="<?php echo($details_data["name"]); ?>"/>
            </div>

        </div>
        <div class="invoiceDiv12">
            <div class="invoiceDiv14">
                <label class="invoiceLabel3">Address</label>
                <input type="text" class="invoiceInput2" id="address" value="<?php echo($details_data["address"]); ?>"/>
            </div>

        </div>
        <div class="invoiceDiv12">
            <div class="invoiceDiv14">
                <label class="invoiceLabel3"></label>
                <input type="text" class="invoiceInput2" />
            </div>

        </div>
        <div class="invoiceDiv12">
            <div class="invoiceDiv14">
                <label class="invoiceLabel3">Tel No</label>
                <input type="text" class="invoiceInput2" id="mobile" value="<?php echo($details_data["mobile"]); ?>"/>
            </div>

        </div>



        <div class="invoiceDiv16">
            <div class="invoiceDiv15">THE PRESCRIPTION</div>
        </div>
        
        <div class="invoiceDiv17">
            <label class="invoiceLabel4"></label>
            <label class="invoiceLabel4"></label>
            <label class="invoiceLabel4" >SPH</label>
            <label class="invoiceLabel4" >CYL</label>
            <label class="invoiceLabel4" >AXIS</label>
            <label class="invoiceLabel4" >ADD</label>
        </div>
        <div class="invoiceDiv17">
            <label class="invoiceLabel4">R/E</label>
            <input type="text" class="invoiceLabel4" />
            <input type="text" class="invoiceLabel4" id="r_sph" value="<?php echo($details_data["r_sph"]); ?>"/>
            <input type="text" class="invoiceLabel4" id="r_cyl" value="<?php echo($details_data["r_cyl"]); ?>"/>
            <input type="text" class="invoiceLabel4" id="r_axis" value="<?php echo($details_data["r_axis"]); ?>"/>
            <input type="text" class="invoiceLabel4" id="r_add" value="<?php echo($details_data["r_add"]); ?>"/>

        </div>
        <div class="invoiceDiv17">
            <label class="invoiceLabel4">L/E</label>
            <input type="text" class="invoiceLabel4" />
            <input type="text" class="invoiceLabel4" id="l_sph" value="<?php echo($details_data["l_sph"]); ?>"/>
            <input type="text" class="invoiceLabel4" id="l_cyl" value="<?php echo($details_data["l_cyl"]); ?>"/>
            <input type="text" class="invoiceLabel4" id="l_axis" value="<?php echo($details_data["l_axis"]); ?>"/>
            <input type="text" class="invoiceLabel4" id="l_add" value="<?php echo($details_data["l_add"]); ?>"/>

        </div>
        <div class="invoiceDiv12">
            <div class="invoiceDiv13">
                <label class="invoiceLabel5">PD</label>
                <input type="text" class="invoiceInput1" id="pd" value="<?php echo($details_data["pd"]); ?>" />
            </div>
            <div class="invoiceDiv13">
                <label class="invoiceLabel5">SH</label>
                <input type="text" class="invoiceInput1" id="sh" value="<?php echo($details_data["sh"]); ?>"/>
            </div>
        </div>
        <div class="invoiceDiv20">
            <label class="invoiceLabel3">Remarks</label>
            <textarea class="invoiceInput2" rows="3" cols="40" id="remarks"><?php echo($details_data["remarks"]); ?></textarea>
        </div>
        <div class="invoiceDiv12">
            <div class="invoiceDiv13">
                <label class="invoiceLabel2">Lens</label>
                <input type="text" class="invoiceInput1" id="lens" value="<?php echo($details_data["lens"]); ?>"/>
            </div>
            <div class="invoiceDiv13">
                <label class="invoiceLabel2">Frame</label>
                <input type="text" class="invoiceInput1" id="frame" value="<?php echo($details_data["frame"]); ?>"/>
            </div>
        </div>
        <div class="invoiceDiv21">
            <div class="invoiceDiv22">
                <label class="invoiceLabel6">Frame :</label>
                <input type="text" class="invoiceInput5" id="frame_price" value="<?php echo($details_data["frame_price"]); ?>"/>

            </div>
            <div class="invoiceDiv22">
                <label class="invoiceLabel6">Lens :</label>
                <input type="text" class="invoiceInput5" id="lens_price" value="<?php echo($details_data["lens_price"]); ?>"/>

            </div>

            <div class="invoiceDiv22">
                <label class="invoiceLabel6">Other :</label>
                <input type="text" class="invoiceInput5" id="other" value="<?php echo($details_data["other"]); ?>"/>

            </div>
<?php  
$amount = intval($details_data["other"]) + intval($details_data["lens_price"]) + intval($details_data["frame_price"]);

?>
            <div class="invoiceDiv22">
                <label class="invoiceLabel6">AMOUNT :</label>
                <input type="text" class="invoiceInput5" id="amount" value="<?php echo($amount); ?>"/>

            </div>

            <div class="invoiceDiv22">
                <label class="invoiceLabel6">Discount :</label>
                <input type="text" class="invoiceInput5" id="discount" value="<?php echo($details_data["discount"]); ?>"/>

            </div>
<?php

$total = $amount - intval($details_data["discount"]);

?>
            <div class="invoiceDiv22">
                <label class="invoiceLabel6">TOTAL AMOUNT :</label>
                <input type="text" class="invoiceInput5" id="total" value="<?php echo($total); ?>"/>

            </div>

            <div class="invoiceDiv22">
                <label class="invoiceLabel6">Advance :</label>
                <input type="text" class="invoiceInput5" id="advance" value="<?php echo($details_data["advance"]); ?>"/>

            </div>
<?php

$balance = $total - intval($details_data["advance"]);

?>
            <div class="invoiceDiv22">
                <label class="invoiceLabel6">BALANCE :</label>
                <input type="text" class="invoiceInput5" id="balance" value="<?php echo($balance); ?>"/>

            </div>

        </div>
        <div class="invoiceDiv23">Thank you very much for choosing Don Vision. Please kindly note that management will not be responsible for the order NOT collected within one month from the date of delivery. We welcome any comments or complaints. Please call 0776906692</div>
        <div class="invoiceDiv12" style="margin-top: 4%;">
            <div class="invoiceDiv13">
                <label class="invoiceLabel7">Customers Signature</label>
                <input type="text" class="invoiceInput6" />
            </div>
            <div class="invoiceDiv13">
                <label class="invoiceLabel7">Approval Signature</label>
                <input type="text" class="invoiceInput6" />
            </div>
        </div>
        
    </div>






















    <script src="script.js"></script>
</body>

</html>
<?php


}else{
    echo("No Page");
}
?>

