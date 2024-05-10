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
    <div class="contactUsDiv1">
        <div class="contactUsDiv2">Contact Us</div>
        <div class="contactUsDiv3">
            <div class="contactUsDiv4">
                <div class="contactUsDiv5">
                    <label class="contactLabel1">First Name</label>
                    <input type="text" class="contactInput1"  id="fname"/>
                </div>
                <div class="contactUsDiv5">
                    <label class="contactLabel1">Last Name</label>
                    <input type="text" class="contactInput1" id="lname"/>
                </div>


            </div>
            <div class="contactUsDiv4">
                <div class="contactUsDiv7">
                    <label class="contactLabel1">Email</label>
                    <input type="text" class="contactInput1" id="email"/>
                </div>
              

            </div>
            <div class="contactUsDiv6">
                <label class="contactLabel1">Message</label>
                <textarea rows="10" cols="10" class="contactInput2" id="message"></textarea>
            </div>
            <div class="contactUsDiv6" style="width: 98%;">
                <button class="contactUsButton1" onclick="contactUs();">Submit</button>
            </div>

            <div class="productViewFooterDiv" style="margin-top: 5%;">
                <p class="productViewFooter1">Don Vision Opticians | 2023 | &copy;All copyrights reserved</p>
                <p class="productViewFooter1">Developed by <a href="http://www.hendecagen.com/" style="text-decoration:none ; color:gray"><b>HENDECAGEN</b></a></p>
            </div>


        </div>



    </div>









    <script src="script.js"></script>
</body>

</html>