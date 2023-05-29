<?php

require "app/connection.php";
session_start();

$email = $_POST["e"];
$password = $_POST["p"];
$rememberMe = $_POST["r"];

if (empty($email)) {
    echo ("Invalid Email");
} else if (strlen($email) >= 50) {
    echo ("Email must be 50 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email");
} else if (empty($password)) {
    echo ("Empty Password ");
} else if (strlen($password) < 5 || strlen($password) > 50) {
    echo ("Password must be between 5 - 50 character");
} else {

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `pasword`='" . $password . "' AND `status_id`='1'");
    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {

        echo ("success");
        $user_data = $user_rs->fetch_assoc();
        $_SESSION["ac_u"] = $user_data;

        if ($rememberMe == "true") {
            setcookie("email2", $email, time() + (60 * 60 * 24 * 365));
            setcookie("password2", $password, time() + (60 * 60 * 24 * 365));
        } else {
            setcookie("email2", "", -1);
            setcookie("password2", "", -1);
        }

    } else if ($user_num <= 0) {
        echo ("Invalid email or password");
    } else {
        echo ("Something Wrong");
    }
}
