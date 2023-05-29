<?php

$adminPanelLocation = '/onlineCakeShop/admin/index.php';

if ($adminPanelLocation == $_SERVER['PHP_SELF']) {
    require_once("adminProcess/adminUserAccessValidator.php"); // validate user access
    require_once("../app/connection.php");
} else {
    require_once("../adminProcess/adminUserAccessValidator.php"); // validate user access
    require_once("../../app/connection.php");
}

$accessValidator = new AdminAccessValidator();
$accessValidator->hasAccess(); // check the access and redirect accordingly

$invoiceTable = Database::search("SELECT * FROM `invoice`");
$productTable = Database::search("SELECT * FROM `product`");


?>
<div class="col-12 p-0 shadow my-3 overflow-hidden rounded-4 bg-dark text-white">
    <div class="row bg-primary m-0">
        <span class="fs-5 fw-bold text-white text-center py-2">Uptime</span>
    </div>
    <div class="row m-0 p-3 d-flex flex-row justify-content-between">
        <div class="col-2 p-0">
            <i class="bi bi-calendar3 fs-1"></i>
        </div>
        <div class="col-10 p-0 h-100 fw-bold fs-6 d-flex justify-content-between align-items-center">
            <div class="row m-0  p-3 d-flex justify-content-between align-items-center h-100 w-100">
                <div class="col-3 fs-4 d-none d-md-block">Year : <span id="year"></span></div>

                <div class="col-2  fs-4  d-none d-md-block">Month : <span id="month"></span></div>

                <div class="col-2 fs-4  d-none d-md-block">Day : <span id="day"></span></div>

                <div class="col-2  fs-4 d-none d-md-block">Hours : <span id="hours"></span></div>

                <div class="col-3 fs-4  d-none d-md-block">Miniutes : <span id="minutes"></span></div>

            </div>
        </div>
    </div>
</div>


<div class="col-6 p-0">
    <div class="row m-0 pe-2">
        <div class="col-12 p-0 shadow my-3 overflow-hidden rounded-4 bg-dark text-white">
            <div class="row bg-primary m-0">
                <span class="fs-5 fw-bold text-white text-center py-2">Total Selling</span>
            </div>
            <div class="row m-0 p-3 d-flex flex-row justify-content-between">
                <span class="text-center fs-3 fw-bold"><?php echo $invoiceTable->num_rows; ?></span>
            </div>
        </div>
    </div>
</div>
<div class="col-6 p-0">
    <div class="row m-0 ps-2">
        <div class="col-12 p-0 shadow my-3 overflow-hidden rounded-4 bg-dark text-white">
            <div class="row bg-primary m-0">
                <span class="fs-5 fw-bold text-white text-center py-2">Total Product</span>
            </div>
            <div class="row m-0 p-3 d-flex flex-row justify-content-between">
                <span class="text-center fs-3 fw-bold"><?php echo $productTable->num_rows; ?></span>
            </div>
        </div>
    </div>
</div>