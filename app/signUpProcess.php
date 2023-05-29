<?php
require "connection.php";

$user = $_POST["user"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$password = $_POST["password"];
$gender = $_POST["gender"];
$city = $_POST["city"];

if (empty($user)) {
    echo("ADE PAKO ENTER KARAPAN USER NAME EKA !!!");
    
}else if (strlen($user) > 20) {
    echo("NAMA DIGA WADI PAKO");
    
}elseif (empty($email)) {
    echo("EMAIL DAPN PAKO");
    
}elseif (strlen($email) >= 50) {
    echo("EMAIL DIGA WADI PAKO");
    
}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    echo("OHOMA EMAIL NA HUTTO !!!");
    
}elseif (empty($mobile)) {
    echo("MOBILE NUMBER EKA DAPN HUTTO");
    
}elseif (strlen($mobile) != 10) {
    echo("MEHEMA MOBILE NUMBER NA  PAKO");
    
}elseif (!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)) {
    echo("THO LANKAWE NEMEDA");

}elseif (empty($password)) {
    echo("PASSWORD EKA DAPAN BALLO");

}elseif (strlen($password) < 5 || strlen($password) > 50) {
    echo("Password must be between 5 - 50 character");
    
    
}elseif (empty($gender)) {
    echo("UBA MOKEKDA");

    
}elseif ($gender < 0 && $gender > 3) {
    echo("AY BN UBATA WENA NADDA");

    
}elseif (empty($city)) {
    echo("CITY DAPN BALLO");
    
}elseif ($city < 0 && $city > 5) {
    echo("AY BN UBATA WENA NADDA");
    
}else {
    $resalt_set = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' OR `mobile`='".$mobile."'");
    $num = $resalt_set->num_rows;

    if ($num > 0) {
        echo("User with the same Email or Mobile  alredy exists");
        
    }else {
        $dateNew = new DateTime();
        $tz   = new DateTimeZone("Asia/Colombo");
        $dateNew->setTimezone($tz);
        $date = $dateNew->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user`
        (`user`,`mobile`,`email`,`pasword`,`gender_id`,`city_city_id`,`reg_date_time`,`status_id`) VALUES
        ('".$user."','".$mobile."','".$email."','".$password."','".$gender."','".$city."','".$date."','1')
        ");

        echo("ATHUL KARANNA");

    }
}
