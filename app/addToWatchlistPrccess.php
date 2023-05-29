<?php
session_start();
require "connection.php";
// echo($_SESSION["email"]);

if (isset($_SESSION["ac_u"])) {
     if (isset($_GET["id"])) {

          $email = $_SESSION["ac_u"]["email"];
          $pid = $_GET["id"];
          $weightID = $_GET["weight"];

          $user_table = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
          $user_num = $user_table->num_rows;
          $user_data = $user_table->fetch_assoc();
          $userId = $user_data["id"];

          $watchList = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $pid . "' AND `user_id`=
          '" . $userId . "'");
          $watchList_num = $watchList->num_rows;


          if ($watchList_num == 1) {
               $watchList_data = $watchList->fetch_assoc();

               $listed_id = $watchList_data["id"];


              Database::iud("DELETE FROM `watchlist` WHERE `id`='".$listed_id."'");
              echo("Removed Product");
          
          
          
          } else {
               Database::iud("INSERT INTO `watchlist`(`product_id`,`user_id`,`weight_id`) VALUES ('" . $pid . "','" . $userId . "','". $weightID."')");
               echo ("Adedd The Watchlist");
          }
     } else {
          echo ("Somthing Was Wrong");
     }
} else {
     echo ("Please Sign In OR Register");
}
