<?php
$adminPanelLocation = '/algowrite/madusha-project-akshi/akshi/onlineCakeShop/admin/index.php';

if ($adminPanelLocation == $_SERVER['PHP_SELF']) {
    require_once("adminProcess/adminUserAccessValidator.php"); // validate user access
    require_once("../app/connection.php");
} else {
    require_once("../adminProcess/adminUserAccessValidator.php"); // validate user access
    require_once("../../app/connection.php");
}

$accessValidator = new AdminAccessValidator();
$accessValidator->hasAccess(); // check the access and redirect accordingly
?>
setting