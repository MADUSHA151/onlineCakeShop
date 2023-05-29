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


?>
<div class="col-12 p-0" style="overflow: auto; min-width: 600px;">
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="row m-0">
                <span class="fw-bold fs-4 text-center">Order management</span>
            </div>
        </div>

        <div class="col-12 p-0">
            <hr>
        </div>

        <div class="col-12 p-0">
            <div class="row m-0 fw-bold text-white">
                <div class="col-1 bg-secondary p-0">
                    <div class="row m-0 p-2"><span>Id</span></div>
                </div>
                <div class="col-2 bg-dark p-0">
                    <div class="row m-0 p-2"><span>Product</span></div>
                </div>
                <div class="col-2 bg-dark p-0">
                    <div class="row m-0 p-2"><span>Order Id</span></div>
                </div>
                <div class="col-2 bg-secondary p-0">
                    <div class="row m-0 p-2"><span>Placed Date</span></div>
                </div>
                <div class="col-2 bg-dark p-0">
                    <div class="row m-0 p-2"><span>Order date</span></div>
                </div>
                <div class="col-2 bg-secondary p-0">
                    <div class="row m-0 p-2"><span>State</span></div>
                </div>
                <div class="col-1 bg-dark p-0">
                    <div class="row m-0 p-2"><span>action</span></div>
                </div>
            </div>
        </div>


        <div class="col-12 p-0">
            <hr>
        </div>

        <?php

        $invoiceTable = Database::search("SELECT * FROM `invoice` ");


        for ($x = 0; $x < $invoiceTable->num_rows; $x++) {

            $invoiceTableData = $invoiceTable->fetch_assoc();
        ?>


            <div class="col-12 p-0">
                <div class="row m-0 fw-bold text-white">
                    <div class="col-1 bg-secondary p-0">
                        <div class="row m-0 p-2"><span><?php echo $invoiceTableData["id"] ?></span></div>
                    </div>
                    <?php
                    $productTable = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoiceTableData["product_id"] . "'");
                    $productData = $productTable->fetch_assoc();

                    ?>

                    <div class="col-2 bg-dark p-0">
                        <div class="row m-0 p-2"><span><?php echo $productData["title"] ?></span></div>
                    </div>
                    <div class="col-2 bg-dark p-0">
                        <div class="row m-0 p-2"><span><?php echo $invoiceTableData["order_id"] ?></span></div>
                    </div>
                    <div class="col-2 bg-secondary p-0">
                        <div class="row m-0 p-2"><span><?php echo $invoiceTableData["date_time"] ?></span></div>
                    </div>
                    <div class="col-2 bg-dark p-0">
                        <div class="row m-0 p-2"><span>2023-01-15</span></div>
                    </div>
                    <div class="col-2 bg-secondary p-0">
                        <div class="row m-0 p-2"><span class="text-center"><?php if ($invoiceTableData["order_status_id"] == 1) {
                                                                            ?><span class="text-danger bg-dark">Place Order</span><?php
                                                                                                                                } else {
                                                                                                                                    ?>
                                    <span class="text-success bg-dark">Completed</span>
                                <?php
                                                                                                                                } ?></span></div>
                    </div>
                    <div class="col-1 bg-dark p-0">
                        <div class="row m-0 py-2"><span><button onclick="openSingleOrderModel('orderModel<?php echo ($x); ?>');" class="btn btn-primary">View</button></span></div>
                    </div>
                </div>
            </div>


            <div class="modal" tabindex="-1" id="orderModel<?php echo ($x); ?>">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Product title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12 p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">ORDER ID : </span>
                                    <span class="col-7">
                                        <?php echo ($invoiceTableData["order_id"]); ?>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $userDataBase = Database::search("SELECT * FROM `user` WHERE `id`='" . $invoiceTableData["user_id"] . "'");
                            $userData = $userDataBase->fetch_assoc();
                            ?>
                            <div class="col-12 p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">Email : </span>
                                    <span class="col-7">
                                        <?php echo ($userData["email"]); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12  p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">Address : </span>
                                    <span class="col-7">
                                        <?php echo ($userData["delivery_address"]); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">Phone Number : </span>
                                    <span class="col-7">
                                        <?php echo ($userData["mobile"]); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">User Name : </span>
                                    <span class="col-7">
                                        <?php echo ($userData["user"]); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">Product Name : </span>
                                    <span class="col-7">
                                        <?php echo ($productData["title"]); ?>
                                    </span>
                                </div>
                            </div>
                            <?php
                            $weightDataBase = Database::search("SELECT * FROM `weight` WHERE `id`='" . $invoiceTableData["weight_id"] . "'");
                            $weightData = $weightDataBase->fetch_assoc();
                            ?>
                            <div class="col-12 p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">Product Weight : </span>
                                    <span class="col-7">
                                        <?php echo ($weightData["name"]); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            <div>
                                <?php if ($invoiceTableData["order_status_id"] == 1) {
                                ?><button class="btn btn-outline-danger" onclick="placeOrderButton(<?php echo $invoiceTableData['id']; ?>);">Place Order</button><?php

                                                                                                                                                                } else {
                                                                                                                                                                    ?>
                                    <span class="badge rounded-pill text-bg-success">Completed</span>
                                <?php
                                                                                                                                                                } ?>

                            </div>
                            <div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        <?php
        }

        ?>
    </div>
</div>