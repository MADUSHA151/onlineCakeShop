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
                <span class="fw-bold fs-4 text-center">FeedBacks Management</span>
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
                    <div class="row m-0 p-2"><span>Order Id</span></div>
                </div>
                <div class="col-3 bg-dark p-0">
                    <div class="row m-0 p-2"><span>User Email</span></div>
                </div>
                <div class="col-2 bg-secondary p-0">
                    <div class="row m-0 p-2"><span>Status</span></div>
                </div>
                <div class="col-4 bg-dark p-0">
                    <div class="row m-0 p-2"><span>FeedBacks</span></div>
                </div>
            </div>
        </div>


        <div class="col-12 p-0">
            <hr>
        </div>

        <?php

        $feedBacksTable = Database::search("SELECT * FROM `feedbacks` ");


        for ($x = 0; $x < $feedBacksTable->num_rows; $x++) {

            $feedBacksData = $feedBacksTable->fetch_assoc();
            $order_id = $feedBacksData["order_id"];
        ?>


            <div class="col-12 p-0">
                <div class="row m-0 fw-bold text-white">
                    <div class="col-1 bg-secondary p-0">
                        <div class="row m-0 p-2"><span><?php echo $feedBacksData["id"] ?></span></div>
                    </div>
                    <div class="col-2 bg-dark p-0">
                        <div class="row m-0 p-2"><span><?php echo $feedBacksData["order_id"] ?></span></div>
                    </div>
                    <?php
                    $userTable = Database::search("SELECT * FROM `user` WHERE `id`='" . $feedBacksData["user_id"] . "'");
                    $userData = $userTable->fetch_assoc();
                    ?>
                    <div class="col-3 bg-dark p-0">
                        <div class="row m-0 p-2"><span><?php echo $userData["email"] ?></span></div>
                    </div>

                    <div class="col-2 bg-secondary p-0">
                        <div class="row m-0 p-2"><span class="text-center"><?php if ($feedBacksData["status_id"] == 2) {
                                                                            ?><button class="btn btn-danger" onclick="changeReview(<?php echo $x ?>,'<?php echo $feedBacksData['order_id'] ?>','<?php echo $feedBacksData['user_id']; ?>','1')">Add a Review</button><?php
                                                                                                                                                                                                } else {
                                                                                                                                                                                                    ?>
                                    <button class="btn btn-success" onclick="changeReview(<?php echo $x ?>,'<?php echo $feedBacksData['order_id'] ?>','<?php echo $feedBacksData['user_id']; ?>','2');">Reviewed</button>
                                <?php
                                                                                                                                                                                                } ?></span></div>
                    </div>
                    <div class="col-4 bg-dark p-0">
                        <div class="row m-0 py-2"><span><?php echo $feedBacksData["feedback"] ?></span></div>
                    </div>
                </div>
            </div>
        <?php
        }

        ?>
    </div>
</div>