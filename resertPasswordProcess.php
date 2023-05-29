<?php
session_start();
require "app/connection.php";

if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    
    
}else {
    echo("failed");
}

$password = $_POST["pw"];
$retypePassword = $_POST["rpw"];
$verificationCode= $_POST["vr"];

if (empty($password)) {
    echo("Please Enter Your Password");
    
}elseif (strlen($password) < 5 || strlen($password) > 20) {
    echo("Invalide Password");
    
}elseif (empty($retypePassword)) {
    echo("Please Enter Re-type your New Pasasword");

    
}elseif ($password != $retypePassword) {
    echo("Passoword does not matched");
    
}elseif (empty($verificationCode)) {
    echo("Please Enter your Verification Code");
    
}else {
    
    $rs = Database::search("SELECT *  FROM `user` WHERE `email`='".$email."'
    AND `varificatiod_code`='".$verificationCode."'");

    $rs_num = $rs->num_rows;

    if ($rs_num == 1) {
        Database::iud("UPDATE `user` SET `pasword`='".$password."' WHERE `email`='".$email."'");
        echo("success");
        
    }else {
        echo("Invalide Email or Verification Code");
    }
}




