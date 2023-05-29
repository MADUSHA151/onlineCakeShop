<?php
session_start();
require "connection.php";
// echo($_SESSION["email"]);


if (isset($_SESSION["ac_u"])) {
     if (isset($_GET["id"])) {

          $email = $_SESSION["ac_u"]["email"];
          $pid = $_GET["id"];
          $qty = $_GET["qty"];


          $user_table = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
          $user_num = $user_table->num_rows;
          $user_data = $user_table->fetch_assoc();
          $userId = $user_data["id"];

          $cart = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $pid . "' AND `user_id`=
          '" . $userId . "'");
          $cart_num = $cart->num_rows;

          $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
          $product_data = $product_rs->fetch_assoc();
          $product_qty = $product_data["qty"];

          if (isset($_GET["weight"])) {

               $weightID = $_GET["weight"];

               Database::iud("UPDATE `cart` SET `weight_id`='" . $weightID . "' WHERE `product_id`='" . $pid . "' AND `user_id`='" . $userId . "'");
          } else {
               Database::iud("INSERT INTO `cart`(`product_id`,`user_id`,`qty`,`weight_id`) VALUES ('" . $pid . "','" . $userId . "','1','" . $weightID . "')");
               echo ("Product Adedd Successfully");
          }

          if ($cart_num == 1) {
               $cart_data = $cart->fetch_assoc();
               $current_qty = $cart_data["qty"];
               $new_qty = (int)$current_qty + 1;

               if ($product_qty >= $new_qty) {
                    Database::iud("UPDATE `cart` SET `qty`='" . $new_qty . "' WHERE `product_id`='" . $pid . "' AND `user_id`='" . $userId . "'");
                    echo ("Product Updated");
               } else {
                    echo ("Invalid Quantity");
               }
          } else {
               Database::iud("INSERT INTO `cart`(`product_id`,`user_id`,`qty`,`weight_id`) VALUES ('" . $pid . "','" . $userId . "','". $qty."','" . $weightID . "')");
               echo ("Product Adedd Successfully");
          }
     } else {
          echo ("Somthing Was Wrong");
     }
} else {
     echo ("Please Sign In OR Register");
}
