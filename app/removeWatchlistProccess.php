<?php
require "connection.php";

$WatchlistID = $_GET["watchListID"];

Database::iud("DELETE FROM `watchlist` WHERE `id`='".$WatchlistID."'");
echo("Removed Successfully");

?>