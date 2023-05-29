<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akshi Cake Shop | Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/cart.css">
    <link rel="stylesheet" href="style/main.css">

</head>

<body style="overflow-x:hidden;background-image:linear-gradient(180deg, #6CF4FD 0%, #E1B1B1 100%);min-height:100vh;">

    <div class="container">
        <div class="row">
            <!-- header -->
            <?php
            include("header.php");
            ?>
            <!-- header -->
            <div class="col-12" id="cartView" style="display: block;">
                <div class="row">

                    <div class="col-12 mt-5 mb-4 ">
                        <div class="row">
                            <span class="fw-bold fs-1 ms-lg-5">Your Cart</span>
                        </div>
                    </div>

                    <?php
                    // require "app/connection.php";
                    // session_start();

                    if (isset($_SESSION["ac_u"])) {
                        $email = $_SESSION["ac_u"]["email"];

                        $total = 0;
                        $subtotal = 0;
                        $shipping = 1000;

                    ?>

                        <?php
                        $user_table = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
                        $user_num = $user_table->num_rows;
                        $user_data = $user_table->fetch_assoc();
                        $userId = $user_data["id"];

                        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_id`='" . $userId . "'");
                        $cart_num = $cart_rs->num_rows;

                        if ($cart_num == 0) {

                        ?>
                            <!-- Empty View -->
                            <div class="col-12 d-flex justify-content-center ">
                                <div class="row">
                                    <div class="col-12 mt-5 mb-5  border border-1 border-dark  rounded-circle">

                                        <img src="image/cartsvgs/emptycart.svg" width="100%" height="100%">

                                    </div>

                                    <a href="index.php" class="btn btn-success">SHOPPING</a>

                                </div>
                            </div>

                            <!-- Empty View -->
                        <?php

                        } else {

                        ?>
                            <!-- Haave Product -->

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12 mt-5 ms-lg-4 ">
                                        <div class="row">
                                            <div class="col-lg-2 col-3 cart-body-main-font">
                                                <span class="fw-bold text-uppercase">product</span>
                                            </div>

                                            <div class="col-lg-1 col-2  offset-lg-2 cart-body-main-font">
                                                <span class="fw-bold text-uppercase cart-body-main-font">price</span>
                                            </div>

                                            <div class="col-lg-1 col-3 offset-lg-1 cart-body-main-font">
                                                <span class="fw-bold text-uppercase">quantity</span>
                                            </div>

                                            <div class="col-lg-1 col-2 offset-lg-1 cart-body-main-font">
                                                <span class="fw-bold text-uppercase">weight</span>
                                            </div>

                                            <div class="col-lg-1 col-2 offset-lg-1 cart-body-main-font">
                                                <span class="fw-bold text-uppercase">total</span>
                                            </div>
                                        </div>
                                        <div class="col-11">
                                            <hr>
                                        </div>

                                    </div>

                                    <?php
                                    // Have Product
                                    for ($x = 0; $x < $cart_num; $x++) {

                                        $cart_data = $cart_rs->fetch_assoc();


                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "'");
                                        $product_data = $product_rs->fetch_assoc();

                                        $total = $total + ($product_data["price"] * $cart_data["qty"]);

                                    ?>


                                        <div class="col-12 ms-lg-4">
                                            <div class="row">
                                                <div class="col-1 col-lg-2 image-column-image-tag mb-4 mb-lg-0">
                                                    <a href='<?php echo "singleProduct.php?id=" . $product_data["id"]; ?>'>
                                                        <div class="row">

                                                            <?php
                                                            $image_data = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $product_data["id"] . "'");
                                                            $image_num = $image_data->num_rows;
                                                            $image_row = $image_data->fetch_assoc();
                                                            ?>
                                                            <img src="<?php echo ($image_row["coad"]); ?>">

                                                        </div>
                                                    </a>
                                                    <a href='<?php echo "singleProduct.php?id=" . $product_data["id"]; ?>' class="text-decoration-none text-black d-lg-none d-block cart-body-main-font-contain ">
                                                        <div class="row">
                                                            <span class="fw-semibold"><?php echo ($product_data["title"]); ?></span>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col-1 col-lg-2 mt-lg-5 d-none d-lg-block ">
                                                    <a href='<?php echo "singleProduct.php?id=" . $product_data["id"]; ?>' class="text-decoration-none text-black">
                                                        <div class="row">
                                                            <span class="fw-bold"><?php echo ($product_data["title"]); ?></span>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col-1 col-lg-2  mt-lg-5 price-padding cart-body-main-font-contain">
                                                    <div class="row">
                                                        <span class="fw-bold"><?php echo ($product_data["price"]); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-3 col-md-2 mt-lg-5 offset-lg-0 offset-1 cart-body-main-font-contain  ms-md-5">
                                                    <div class="row">
                                                        <div class="border border-1 bg-white text-center border-secondary rounded overflow-hidden float-left  position-relative product-qty">
                                                            <!-- <span>Quantity : </span> -->
                                                            <input type="text" class="border-0   cart-body-main-font-contain fw-bold text-start" style="outline: none;" pattern="[0-9]" value="<?php echo ($cart_data["qty"]); ?>" id="qty_input<?php echo $cart_data['id']; ?>" onkeyup='checkValue(<?php echo $product_data["qty"]; ?>);' />
                                                            <div class="position-absolute qty-buttons">
                                                                <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-secondary qty-inc">

                                                                    <i class="bi bi-caret-up-fill text-primary  cart-body-main-font-contain" onclick='qty_inc(<?php echo $product_data["qty"]; ?>,<?php echo $cart_data["id"]; ?>);qty_update(<?php echo $cart_data["id"]; ?>);'></i>
                                                                </div>
                                                                <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-secondary qty-dec">

                                                                    <i class="bi bi-caret-down-fill text-primary  cart-body-main-font-contain" onclick="qty_dec(<?php echo $cart_data['id']; ?>); qty_update(<?php echo $cart_data['id']; ?>)"></i>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <?php
                                                $weiht_table = Database::search("SELECT * FROM `weight` WHERE `id`='" . $cart_data["weight_id"] . "'");
                                                $weight_data = $weiht_table->fetch_assoc();
                                                ?>
                                                <div class="col-2 mt-lg-5  ms-md-5  cart-body-main-font-contain weigt">
                                                    <div class="row">
                                                        <span class="fw-bold"><?php echo ($weight_data["name"]); ?></span>
                                                    </div>

                                                </div>
                                                <div class="col-1 mt-lg-5 total-padding cart-body-main-font-contain">
                                                    <div class="row">
                                                        <span class="fw-bold "><?php echo ($product_data["price"] * $cart_data["qty"]) ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-12 mt-lg-5 mt-4 cart-body-main-font-contain">
                                                    <div class="row">
                                                        <span class="fw-bold"><button class="btn btn-danger" onclick="removeCart(<?php echo $cart_data['id']; ?>);">Remove</button></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-11 col-12">
                                                    <hr>
                                                </div>

                                            </div>

                                        </div>
                                    <?php
                                    }

                                    // Have Product

                                    ?>

                                    <!-- Order Summery -->
                                    <div class="col-12 col-lg-4 col-md-6 mb-5 offset-md-6 offset-lg-8">


                                        <div class="col-12 bg-white opacity-75 border border-1 rounded-4 ">

                                            <div class="col-12 mt-3  ms-4">
                                                <span class="fw-bold fs-6">Order Summery</span>

                                            </div>

                                            <div class="col-10 ms-4">
                                                <hr>
                                            </div>

                                            <div class="col-12 mt-3 mb-3 ms-4 fw-bold">
                                                <span>Sub Total</span>
                                                <span class="summery-total"><?php echo $total; ?>.00</span>
                                            </div>

                                            <div class="col-12 mt-3 mb-3 ms-4 fw-bold">
                                                <span>Shipping Fee</span>
                                                <span class="summery-shipping"><?php echo $shipping; ?>.00</span>
                                            </div>

                                            <div class="col-10 ms-4 mt-5 mb-2">
                                                <hr>
                                            </div>


                                            <div class="col-12 mt-3  ms-4 mb-5 fw-bold ">
                                                <span class="fw-bold fs-6">Total</span>
                                                <span class="summery-shipping-total"><?php echo $total + $shipping; ?>.00</span>
                                            </div>

                                        </div>

                                        <div class="mt-3 col-12 text-center">
                                            <button class="btn btn-success  rounded-4 text-uppercase w-100 " style="background-color:green;height:50px;" onclick="chekcoutToggle();">checkout</button>

                                        </div>

                                    </div>
                                    <!-- Order Summery -->



                                </div>
                            </div>



                            <!-- Have Product -->


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


                </div>
            </div>

            <div class="col-12 mt-5" id="readyToPay" style="min-height:70vh;display:none;">
                <div class="row g-3">
                    <div class="col-lg-6 col-12">
                        <h4 class="fw-bold">First Name</h4>
                        <input type="text" value="<?php echo $user_data["user"]?>" class="form-control" readonly>
                    </div>
                    <div class="col-lg-6 col-12">
                        <h4 class="fw-bold">Email</h4>
                        <input type="text" value="<?php echo $user_data["email"]?>" class="form-control" readonly>

                    </div>
                    <div class="col-lg-6 col-12">
                        <h4 class="fw-bold">Mobile</h4>
                        <input type="text" id="mobile" value="<?php echo $user_data["mobile"]?>" class="form-control">

                    </div>
                    <div class="col-lg-6 col-12">
                        <h4 class="fw-bold">Dilivery Address</h4>
                        <input type="text" id="address" value="<?php if ($user_data["delivery_address"] != null) {
                            echo $user_data["delivery_address"];
                        }else {
                           null;
                        }
                        ?>" class="form-control"  placeholder="Enter Your Address" >

                    </div>
                    <div class="col-lg-6 col-12">
                        <h4 class="fw-bold">Total Price</h4>
                        <input type="text" id="totalCost" value="Rs. <?php echo $total + $shipping; ?>.00" class="form-control" readonly>

                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <button class="btn btn-danger  col-lg-6 col-12" onclick="paymentProcess(<?php echo $userId;?>);" id="payhere-payment">PAY NOW</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php
    require_once "footer.php";
    ?>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="script/script.js"></script>
</body>

</html>