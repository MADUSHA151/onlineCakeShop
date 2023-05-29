<?php
require "connection.php";

$watchlistID = $_GET["wID"];

$table = Database::search("SELECT * FROM `watchlist` WHERE `id`='" . $watchlistID . "'");
$row_Data = $table->fetch_assoc();

// We Need Ids (product_id,Weight_id,user_id)
$product_id = $row_Data["product_id"];
$weight_id  = $row_Data["weight_id"];
$user_id    = $row_Data["user_id"];
// We Need Ids (product_id,Weight_id,user_id)



$cartSearchTable = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $user_id . "' AND `weight_id`='" .$weight_id. "' AND `product_id`='".$product_id."'");
$cartNumber = $cartSearchTable->num_rows;

if ($cartNumber > 0) {
     echo ("Thise Product Alredy Addedd");
} else {
     // Insert Data For Cart
     Database::iud("INSERT INTO `cart`(`user_id`,`qty`,`product_id`,`weight_id`) VALUES
     ('" . $user_id . "','1','" . $product_id . "','" . $weight_id . "')");
     echo ("Adding Successfully");
     // Insert Data For Cart
}
