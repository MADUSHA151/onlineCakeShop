<?php
require "connection.php";


if (isset($_GET["id"])) {
     $cartID = $_GET["id"];
     $deleteCartFROMPRODUCT = Database::iud("DELETE FROM `cart` WHERE `id`='" . $cartID . "'");
     echo ("SUCCESS");
} else {
     echo ("Somthing Wrong");
}
