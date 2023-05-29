<?php

session_start();
require "app/connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$email = $_POST["email"];
$_SESSION["email"] = $email;

if (empty($email)) {
    echo("Missing Email Address");
    
}elseif (strlen($email) >= 50) {
    echo("Your Email is Not Valide");
    
}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    echo("Your Email is Not valide");
    
}else {
    $resalte_set = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");
    $resalte_num = $resalte_set->num_rows;

    if ($resalte_num == 1) {

        $code = uniqid();

        Database::iud("UPDATE `user` SET `varificatiod_code`='".$code."' WHERE `email`='".$email."'");

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ceylonecraft@gmail.com';
        $mail->Password = 'xtjcxtrpkmleiuwy';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('ceylonecraft@gmail.com', 'Reset Password');
        $mail->addReplyTo('ceylonecraft@gmail.com', 'Reset Password');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Akshi Cake Shop Forgot Password Verification Code';
        $bodyContent = '<h1 style ="color:green">Your Verification code is ' . $code . '</h1>';
        $mail->Body  = $bodyContent;

        if (!$mail->send()) {
            echo 'Verification code
            sending failed';
        } else {
            echo ("success");
        }



        
    }else {
        echo("Invalide Email");
    }


}
