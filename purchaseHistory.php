<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchasing History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/style.css" />


</head>

<body style="background: linear-gradient(0deg, #159797 -21.25%, #F5F5F5 92.68%); min-height: 100vh;">
    <div class="container">

        <!-- header -->
        <?php
        include("header.php");
        ?>
        <!-- header -->
        <div class="col-12 d-flex justify-content-center pt-3 mb-3">
            <h1 class="fw-bold">Purchase History</h1>
        </div>

        <?php

        if (isset($_SESSION["ac_u"])) {
            $email = $_SESSION["ac_u"]["email"];

            // user Search table
            $user_table = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
            $user_num = $user_table->num_rows;
            $user_data = $user_table->fetch_assoc();
            $userId = $user_data["id"];



            // repeat data stop table
            $invoice_table = Database::search("SELECT DISTINCT `order_id` FROM `invoice` WHERE `user_id` = '" . $userId . "'");
            // echo ($invoice_table->num_rows);

            for ($i = 0; $i < $invoice_table->num_rows; $i++) {

                $invoice_data = $invoice_table->fetch_assoc();
                $order_id = $invoice_data['order_id'];


        ?>
                <!-- invoice model -->
                <div class="col-12 p-0 mt-3 mb-3">
                    <div class="row m-0">
                        <!-- header -->
                        <header class="col-12 bg-secondary border-bottom border-dark shadow-sm rounded-top ">
                            <div class="row">
                                <div class="col-lg-9 col-12 p-2 text-white-50">
                                    <label class="fw-bold fs-2">Order Id : </label>
                                    <label class="fs-4 fw-semibold"><?php echo ($invoice_data["order_id"]); ?></label>
                                </div>
                                <?php
                                $total_search_db = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $order_id . "' AND `user_id`='" . $userId . "'");
                                $total_data = $total_search_db->fetch_assoc();
                                ?>
                                <div class="col-lg-3 col-12 p-2 text-white-50">
                                    <label class="fw-bold fs-2">Total : </label>
                                    <label class="fs-4 fw-semibold">Rs <?php echo $total_data["total"] ?></label>
                                </div>
                            </div>
                        </header>
                        <!-- body -->
                        <div class="col-12 bg-success m-0 rounded-bottom">
                            <div class="row p-0">
                                <div class="col-lg-6 col-12 bg-body p-lg-3  border-end border-dark">
                                    <div class="row ">
                                        <?php
                                        // repeat integration  table
                                        $product_search_db = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $order_id . "' AND `user_id`='" . $userId . "'");
                                        for ($x = 0; $x < $product_search_db->num_rows; $x++) {
                                            $data = $product_search_db->fetch_assoc();
                                            $qty = $data["qty"];
                                        ?>
                                            <?php
                                            $product_database = Database::search("SELECT * FROM `product` WHERE `id`='" . $data["product_id"] . "'");
                                            for ($z = 0; $z < $product_database->num_rows; $z++) {
                                                $product_data = $product_database->fetch_assoc();
                                                $per_price = $product_data["price"];
                                                // total cost only product
                                                $total = $per_price * $qty;

                                            ?>

                                                <div class="col-3 p-0 ">
                                                    <img src="./image/productImg/cake-9747.png" style="width: 100px; height: 100px;">
                                                </div>
                                                <div class="col-9 ps-3 ">
                                                    <div class="col-12">
                                                        <label for="" class="fw-bold fs-4"><?php echo $product_data["title"]; ?></label>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="" class="fw-bold fs-5">qty : <?php echo $data["qty"]; ?></label>
                                                    </div>

                                                    <div class="col-12">
                                                        <label for="" class="fw-bold fs-5">Per Price : <?php echo $product_data["price"] ?></label>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="" class="fw-bold fs-5">Total : <?php echo $total ?></label>
                                                    </div>
                                                    <div class="col-12">
                                                        <?php
                                                        $categoryDatabase = Database::search("SELECT * FROM `category` WHERE `id`='" . $product_data["category_id"] . "'");
                                                        for ($s = 0; $s < $categoryDatabase->num_rows; $s++) {
                                                            $categoryData = $categoryDatabase->fetch_assoc();
                                                        ?>

                                                            <label for="" class="fw-bold fs-5">Category : <?php echo $categoryData["name"] ?></label>

                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                    <div class="col-12">
                                                        <?php
                                                        $weightDatabase = Database::search("SELECT * FROM `weight` WHERE `id`='" . $total_data["weight_id"] . "'");
                                                        for ($f = 0; $f < $weightDatabase->num_rows; $f++) {
                                                            $weightData = $weightDatabase->fetch_assoc();
                                                        ?>

                                                            <label for="" class="fw-bold fs-5">weight : <?php echo $weightData["name"] ?></label>

                                                        <?php
                                                        }
                                                        ?>

                                                    </div>
                                                </div>



                                            <?php
                                            }


                                            ?>

                                        <?php

                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                $user_db = Database::search("SELECT * FROM `user` WHERE `id`='" . $total_data["user_id"] . "'");
                                $user_data = $user_db->fetch_assoc();

                                // add 3 days for delivery
                                $delivery_date = date('Y-m-d H:i:s', strtotime($total_data["date_time"] . '+3 days'));
                                ?>

                                <div class="col-lg-3 col-12 bg-body p-3 border-end border-dark">
                                    <div class="col-12 d-flex justify-content-center">
                                        <h4 class="fw-bold">Shipping Info</h4>
                                    </div>
                                    <div class="col-12">
                                        <ul>
                                            <li>Order Place Date : <?php echo $total_data["date_time"] ?></li>
                                            <li>Order Delivery Date : <?php echo $delivery_date ?></li>
                                            <li>Name : <?php echo  $user_data["user"] ?></li>
                                            <li>Address : <?php echo $total_data["address"] ?></li>
                                            <li>Mobile Number : <?php echo $total_data["mobile"] ?></li>
                                            <li>Shipping Charges Rs : 1000</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-12  bg-body p-3">
                                    <div class="col-12 d-flex justify-content-center">
                                        <h4 class="fw-bold">Package Status</h4>
                                    </div>

                                    <div class="col-12">
                                        <?php
                                        if ($total_data["order_status_id"] == 1) {
                                        ?>
                                            <div class="col-12 d-flex justify-content-center p-2">
                                                <span class="badge text-bg-danger">Order Processing</span>
                                            </div>
                                        <?php

                                        } else {
                                        ?>
                                            <div class="col-12 d-flex justify-content-center p-2">
                                                <span class="badge text-bg-success fs-6">Seller Order Accepted</span>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center p-2">
                                                <span class="badge text-bg-warning fs-6">Order Delivered</span>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center p-2">
                                                <button class="btn btn-outline-info" type="button" onclick="openFeedbackModal('feedmodal<?php echo ($i) ?>');">FeedBack</button>
                                            </div>



                                        <?php
                                        }

                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal For feedbacks -->
                        <div class="modal" tabindex="-1" id="feedmodal<?php echo ($i) ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <input id="orderId" value="<?php echo $order_id ?>" readonly />
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea id="feedBackModalContent<?php echo ($i) ?>" cols="45" rows="10" class="h-100 p-3"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="sendFeedBacks(<?php echo ($i) ?>,'<?php echo $order_id ?>','<?php echo $userId ?>');">Send FeedBacks</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php

            }


            ?>


        <?php

        } else {
        ?>
            <script>
                window.location.assign("signIn.php");
            </script>

        <?php
        }

        ?>

        <!-- alert toast -->
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <!-- <img src="..." class="rounded me-2" alt="..."> -->
                    <strong class="me-auto">Akshi Cake</strong>
                    <small>Just Now </small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Your FeedBack Sending Successfully
                </div>
            </div>
        </div>
    </div>
    <script>
        let customersModel;

        function openFeedbackModal(id) {
            let model = new bootstrap.Modal("#" + id);
            model.show();
        }
    </script>
    <script src="./script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>