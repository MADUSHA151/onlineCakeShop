<?php
require "connection.php";

$cart_id = $_GET["id"];
$new_qty = $_GET["qtyinput"];

Database::iud("UPDATE `cart` SET `qty`='".$new_qty."' WHERE `id`='".$cart_id."'");
echo("Queantity Updated");


?>