<?php

require_once("adminUserAccessValidator.php"); // validate user access

$accessValidator = new AdminAccessValidator();
$accessValidator->hasAccess(); // check the access and redirect accordingly


require_once("../../app/connection.php");

$title = $_POST["title"];
$description = $_POST["description"];
$category = $_POST["category_id"];
$qty = $_POST["qty"];
$price = $_POST["price"];
$addedWeight  = $_POST["weights"];




$productExist_rs = Database::search("SELECT * FROM product WHERE title = '" . $title . "' ");
$productExist_num = $productExist_rs->num_rows;


if (empty($title)) {
    echo ("Please add a title");
} else if ($productExist_num != 0) {
    echo ("A product with the same title already exist!");
} else if (strlen($title) > 250 || strlen($title) <= 0) {
    echo ("please select a title less than 250 character");
} else if (empty($description)) {
    echo ("please add a description");
} else if (strlen($description) > 500 || strlen($description) <= 0) {
    echo ("please add a description less  than 500 characters");
} else if ($category == 0) {
    echo ("please select a category");
} else if (empty($qty)) {
    echo ("please add a quantity");
} else if (strlen($qty) >= 25) {
    echo ("Please select a quantity less than 20 items");
} else if (empty($price)) {
    echo ("Please add a price");
} else if ($price > 50000 || $price <= 0) {
    echo ("Please add a price less than 50000");
} else if ($price > 50000 || $price <= 0) {
    echo ("Please add a price less than 50000");
} else {


    // image adding
    $length = sizeof($_FILES);
    if ($length <= 4 && $length > 0) {

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `product` (title, price, qty, discription, `date tim add`, category_id, status_id) VALUES ('" . $title . "','" . $price . "','" . $qty . "','" . $description . "','" . $date . "','" . $category . "', '1') ");

        $productId_rs = Database::search("SELECT id FROM product WHERE title = '" . $title . "' ");
        $productId_data = $productId_rs->fetch_assoc();

        $prdocutId = $productId_data["id"];



        // weight adding
        $weightArray = explode(',', $addedWeight);
        foreach ($weightArray as $weight) {
            Database::iud("INSERT INTO `product_has_weight` (product_id, weight_id) VALUES ('" . $prdocutId . "', '" . $weight . "') ");
        }

        $allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        for ($x = 0; $x < $length; $x++) {
            if (isset($_FILES["img" . $x])) {
                $img_file = $_FILES["img" . $x];
                $file_extention = $img_file["type"];

                if (in_array($file_extention, $allowed_img_extentions)) {
                    $new_img_extention;

                    if ($file_extention == "image/jpg") {
                        $new_img_extention = ".jpg";
                    }
                    if ($file_extention == "image/jpeg") {
                        $new_img_extention = ".jpeg";
                    }
                    if ($file_extention == "image/png") {
                        $new_img_extention = ".png";
                    }
                    if ($file_extention == "image/svg+xml") {
                        $new_img_extention = ".svg";
                    }

                    $relativeFileLocation = "../../image//productImg//" . $title . "_" . $x  . $new_img_extention;
                    move_uploaded_file($img_file["tmp_name"], $relativeFileLocation);

                    $file_name = "image//productImg//" . $title . "_" . $x  . $new_img_extention;
                    Database::iud("INSERT INTO `image` (`coad`, `product_id`) VALUES ('" . $file_name . "', '" . $prdocutId . "') ");
                } else {
                    echo ("invalid image type");
                }
            }
        }

        echo ("saved successfully");
    } else {
        echo ("Invalid image count");
    }
}
