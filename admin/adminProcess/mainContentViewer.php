<?php

require_once("adminUserAccessValidator.php"); // validate user access

$accessValidator = new AdminAccessValidator();
$accessValidator->hasAccess(); // check the access and redirect accordingly


// admin verification

if (isset($_GET["section"])) {
    include("../pages/" . $_GET["section"] . "Section.php");
} else {
    echo ("nothings");
}
