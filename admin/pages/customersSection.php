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
                <span class="fw-bold fs-4 text-center">Customer Management</span>
            </div>
        </div>

        <div class="col-12 p-0" style="z-index: -1;">
            <hr>
        </div>

        <div class="col-12 p-0">
            <div class="row m-0 fw-bold text-white">
                <div class="col-1 bg-secondary p-0">
                    <div class="row m-0 p-2"><span>Id</span></div>
                </div>
                <div class="col-4 bg-dark p-0">
                    <div class="row m-0 p-2"><span>Full Name</span></div>
                </div>
                <div class="col-2 bg-secondary p-0">
                    <div class="row m-0 p-2"><span>Joined Date</span></div>
                </div>
                <div class="col-2 bg-dark p-0">
                    <div class="row m-0 p-2"><span>Mobile</span></div>
                </div>
                <div class="col-1 bg-secondary p-0">
                    <div class="row m-0 p-2"><span>State</span></div>
                </div>
                <div class="col-2 bg-dark p-0">
                    <div class="row m-0 p-2"><span>action</span></div>
                </div>
            </div>
        </div>

        <div class="col-12 p-0">
            <hr>
        </div>


        <?php

        $user_rs = Database::search("SELECT * FROM user");
        $user_num = $user_rs->num_rows;

        for ($x = 0; $x < $user_num; $x++) {
            $user_data = $user_rs->fetch_assoc();

        ?>


            <div class="col-12 p-0">
                <div class="row m-0 fw-bold text-white">
                    <div class="col-1 bg-secondary p-0">
                        <div class="row m-0 p-2"><span><?php echo ($user_data["id"]); ?></span></div>
                    </div>
                    <div class="col-4 bg-dark p-0">
                        <div class="row m-0 p-2"><span><?php echo ($user_data["user"]); ?></span></div>
                    </div>
                    <div class="col-2 bg-secondary p-0">
                        <div class="row m-0 p-2"><span><?php echo ($user_data["reg_date_time"]); ?></span></div>
                    </div>
                    <div class="col-2 bg-dark p-0">
                        <div class="row m-0 p-2"><span><?php echo ($user_data["mobile"]); ?></span></div>
                    </div>
                    <div class="col-1 bg-secondary p-0">
                        <div class="row m-0 p-2"><span class="text-center">
                                <?php
                                if ($user_data["status_id"] == 0) {
                                ?>
                                    <i class="bi text-danger bi-circle-fill"></i>
                                <?php
                                } else if ($user_data["status_id"] == 1) {
                                ?>
                                    <i class="bi text-success bi-circle-fill"></i>
                                <?php
                                } else if ($user_data["status_id"] == 2) {
                                ?>
                                    <i class="bi text-primary bi-circle-fill"></i>
                                <?php
                                } else {
                                ?>
                                    <i class="bi text-secondary bi-circle-fill"></i>
                                <?php
                                }

                                ?>
                            </span></div>
                    </div>
                    <div class="col-2 bg-dark p-0">
                        <div class="row m-0 py-2"><span><button onclick="openSingleOrderModel('orderModel<?php echo ($x); ?>');" class="btn w-100 btn-primary">View</button></span></div>
                    </div>
                </div>
            </div>




            <div class="modal " tabindex="-1" id="orderModel<?php echo ($x); ?>">
                <div class="modal-dialog modal-dialog-scrollable ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-primary fw-bold"><?php echo ($user_data["user"]); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12 p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">ID : </span>
                                    <span class="col-7">
                                        <?php echo ($user_data["id"]); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12  p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">email : </span>
                                    <span class="col-7">
                                        <?php echo ($user_data["email"]); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12  p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">gender : </span>
                                    <span class="col-7">
                                        <?php
                                        $purchase_rs = Database::search("SELECT * FROM gender WHERE id = '" . $user_data["gender_id"] . "' ");
                                        $gender_data = $purchase_rs->fetch_assoc();
                                        echo ($gender_data["gender"]);
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12  p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">city : </span>
                                    <span class="col-7">
                                        <?php
                                        $purchase_rs = Database::search("SELECT * FROM city WHERE id = '" . $user_data["city_city_id"] . "' ");
                                        $city_data = $purchase_rs->fetch_assoc();
                                        echo ($city_data["name"]);
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">registered date : </span>
                                    <span class="col-7">
                                        <?php echo ($user_data["reg_date_time"]); ?>
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 p-0">
                                <hr>
                            </div>

                            <div class="col-12 p-0">
                                <span class="text-primary fs-5 fw-bold">Expenses</span>
                            </div>

                            <!-- cost section -->
                            <div class="col-12  p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">spent : </span>
                                    <span class="col-7">
                                        <?php
                                        $purchase_rs = Database::search("SELECT * FROM city WHERE id = '" . $user_data["city_city_id"] . "' "); // edit the query accordingly
                                        $purchase_data = $purchase_rs->fetch_assoc();
                                        ?>
                                        Epenses will be here
                                    </span>
                                </div>
                            </div>
                            <div class="col-12  p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">items bought : </span>
                                    <span class="col-7">
                                        <?php
                                        $purchase_rs = Database::search("SELECT * FROM city WHERE id = '" . $user_data["city_city_id"] . "' "); // edit the query accordingly
                                        $purchase_data = $purchase_rs->fetch_assoc();
                                        ?>
                                        item count will be here
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 p-0">
                                <hr>
                            </div>
                            <!-- User control -->
                            <div class="col-12 p-0">
                                <span class="text-primary fs-5 fw-bold">User Controller</span>
                            </div>

                            <div class="col-12  p-0">
                                <div class="row m-0">
                                    <span class="col-5 fw-bold">Action : </span>
                                    <div class="form-check form-switch col-7">
                                        <input class="form-check-input" type="checkbox" role="switch" id="<?php echo $user_data["id"]; ?>" <?php if ($user_data["status_id"] == 1) {
                                                                                                                                            ?>checked<?php
                                                                                                                                                    } ?> onclick="changeStatus(<?php echo $user_data['id']; ?>)" />
                                        <label class="form-check-label" for="<?php echo $user_data["id"]; ?>"><?php if ($user_data["status_id"] == 1) { ?>
                                                User Active


                                            <?php } else { ?>

                                                User Blocked
                                            <?php

                                                                                                                }


                                            ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>


        <?php
        }

        ?>
    </div>
</div>