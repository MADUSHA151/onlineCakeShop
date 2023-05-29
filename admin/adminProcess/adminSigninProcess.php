<?php

session_start();
require_once("../../app/connection.php");

$email = $_POST["email"];
$password = $_POST["password"];

$userCheck_rs = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "' ");
$userCheck_num = $userCheck_rs->num_rows;

if ($userCheck_num == 1) {
    $_SESSION["au_a"] = $userCheck_rs->fetch_assoc();
    echo ("success");
} else {
    echo ("Wrong Email or Password");
}
