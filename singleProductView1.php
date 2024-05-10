<?php
require "connection.php";
if(isset($_GET["id"])){
   $pid =  $_GET["id"];
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Single Product View | DON VISION</title>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" integrity="sha512-UJfAaOlIRtdR+0P6C3KUoTDAxVTuy3lnSXLyLKlHYJlcSU8Juge/mjeaxDNMlw9LgeIotgz5FP8eUQPhX1q10A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php include "header.php"; ?>
    <!-- product slide -->
    <div class="carousel">
        <a href="#one" class="carousel-item">
            <img src="resources/product.jpg" />
        </a>
        <a href="#two" class="carousel-item">
            <img src="resources/product.jpg"  />
        </a>
        <a href="#three" class="carousel-item">
            <img src="resources/product.jpg"/>
        </a>
    </div>
    <!-- product slide -->
<?php
$product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$pid."'");
$product_data = $product_rs->fetch_assoc();
$category_rs = Database::search("SELECT * FROM `category` WHERE `id` = '".$product_data["category_id"]."'");
$category_data = $category_rs->fetch_assoc();

?>

    <div class="p-title">
        <span class="p-name"><?php echo($product_data["id"]); ?></span></br>
        <span class="p-name"><?php echo($category_data["category_name"]); ?> Style</span></br>
        <span class="p-price">Rs.<?php echo($product_data["price"]); ?> .00</span>

        <hr style="width:80%;text-align:center;margin: 10px;">

        <button class="productViewButton1">Order Now</button>
    </div>

    <div style="padding-top: 30%;margin-bottom: 10px;">
        <p class="productViewFooter1">Don Vision Opticians | 2023 | &copy;All copyrights reserved</p></br>
        <p class="productViewFooter1">Developed by HENDECAGEN</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" integrity="sha512-NiWqa2rceHnN3Z5j6mSAvbwwg3tiwVNxiAQaaSMSXnRRDh5C2mk/+sKQRw8qjV1vN4nf8iK2a0b048PnHbyx+Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.carousel').carousel({
                indicators: true
            });
        });
    </script>
    
</body>

</html>

<?php
}
?>

