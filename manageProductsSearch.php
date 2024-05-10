<?php

require "connection.php";

$searchText = $_POST["searchText"];
$category = $_POST["category"];
$brand = $_POST["brand"];

if($category == 0 && $brand == 0){
    $search_rs = Database::search("SELECT * FROM `product` WHERE `id` LIKE '%" . $searchText . "%'");
} else if($category == 0 && $brand > 0){
    $search_rs = Database::search("SELECT * FROM `product` WHERE `id` LIKE '%" . $searchText . "%' AND `brand_id` = '".$brand."'");

}else if($brand == 0 && $category > 0){
    $search_rs = Database::search("SELECT * FROM `product` WHERE `id` LIKE '%" . $searchText . "%' AND `category_id` = '".$category."'");
}else{
    $search_rs = Database::search("SELECT * FROM `product` WHERE `id` LIKE '%" . $searchText . "%' AND `category_id` = '".$category."' AND `brand_id` = '".$brand."'");

}


$search_num = $search_rs->num_rows;
if($search_num == 0){
echo("No products");
}else{
    for ($x = 0; $x < $search_num; $x++) {
        $search_data = $search_rs->fetch_assoc();
        $image_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '" . $search_data["id"] . "'");
        $image_data = $image_rs->fetch_assoc();
    
    ?>
        <!-- product card -->
        <div class="manageProductDiv5">
            <div class="shopDiv5">
                <img src="<?php echo ($image_data["code"]); ?>" class="shopProduct1" />
            </div>
            <hr />
            <div class="shopDiv6">
                <span class="shopProductTitle"><?php echo ($search_data["id"]); ?></span>
                <span class="shopProductPrice">Rs. <?php echo ($search_data["price"]); ?> .00</span>
                <div class="manageProductDiv6">
                <a href='<?php echo "updateProduct.php?id=" . $search_data["id"]; ?>' style="width:100%; display:flex; align-items:center; justify-content:center; text-decoration:none;">
                   <button class="shopButton1" style="width:100%;">Update</button></a>
                    <button class="shopButton1">Delete</button>
                </div>
            </div>
        </div>
        <!-- /product card -->
    
    <?php
    }
    
}
















?>