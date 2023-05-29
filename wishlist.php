<!-- $_SESSION = user Proccess Num Rows -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wishlist | Akshi Cake</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/watchlist.css">
    <link rel="stylesheet" href="style/main.css">
</head>

<body style="background-image:linear-gradient(180deg, #6CF4FD 0%, #E1B1B1 100vh);min-height:100vh;overflow-x: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <!-- header -->
                    <?php
                    include("header.php");
                    ?>
                    <!-- header -->

                    <div class="col-12 mt-5 offset-1 ">
                        <div class="row">
                            <h1 class="fw-bold">
                                My Watchlist
                            </h1>
                        </div>
                    </div>

                    <?php
                    // require "app/connection.php";
                    // session_start();

                    if (isset($_SESSION["ac_u"])) {
                        $email = $_SESSION["ac_u"]["email"];

                    ?>
                        <?php

                        $user_table = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "'");
                        $user_num = $user_table->num_rows;
                        $user_data = $user_table->fetch_assoc();
                        $userId = $user_data["id"];

                        $watchList_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_id`='" . $userId . "'");
                        $watchList_num =  $watchList_rs->num_rows;

                        if ($watchList_num == 0) {

                        ?>
                            <!-- Empty View -->
                            <div class="col-12 d-flex justify-content-center ">
                                <div class="row">
                                    <div class="col-12 mt-5 mb-5  border border-1 border-dark  rounded-circle">

                                        <img src="image/watchlistsvg/watchlistEmptyView.svg" width="100%" height="100%">

                                    </div>

                                    <a href="index.php" class="btn btn-success">SHOPPING</a>

                                </div>
                            </div>

                            <!-- Empty View -->
                        <?php

                        } else {

                        ?>
                            <!-- Have Product -->

                            <div class="col-12 mt-5 offset-1 fw-bold">
                                <div class="row">
                                    <span class="text-uppercase">product</span>
                                    <div class="col-10">
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <?php
                            for ($x = 0; $x < $watchList_num; $x++) {
                                $watch_data = $watchList_rs->fetch_assoc();

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" .  $watch_data["product_id"] . "'");
                                $product_data = $product_rs->fetch_assoc();

                            ?>
                                <div class="col-12 offset-1 ">

                                    <div class="row">

                                        <div class="col-lg-2 col-3">
                                            <a href='<?php echo "singleProduct.php?id=" . $product_data["id"]; ?>'>
                                                <div class="row">
                                                    <?php
                                                    $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $product_data["id"] . "'");
                                                    $image_data = $image_rs->fetch_assoc();
                                                    ?>
                                                    <img src="<?php echo $image_data['coad']; ?>" alt="" class="image-column-image-tag">
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-lg-2 mt-lg-5 col-2  mt-lg-0">
                                            <a href='<?php echo "singleProduct.php?id=" . $product_data["id"]; ?>' class="text-decoration-none text-black">
                                                <div class="row">
                                                    <span><?php echo ($product_data["title"]); ?></span>
                                                </div>
                                            </a>
                                        </div>


                                        <?php
                                        $weiht_table = Database::search("SELECT * FROM `weight` WHERE `id`='" .  $watch_data["weight_id"] . "'");
                                        $weight_data = $weiht_table->fetch_assoc();
                                        ?>


                                        <div class="col-lg-1 mt-lg-5 col-1 ps-5  mt-lg-0">
                                            <div class="row">
                                                <label><?php echo ($weight_data["name"]); ?></label>

                                            </div>
                                        </div>

                                        <div class="col-lg-3 mt-lg-5 offset-lg-1 col-4 ms-2 ms-md-5 ms-lg-0">
                                            <span>Rs. <?php echo ($product_data["price"]); ?>.00</span><br>
                                            <span class="mt-2 text-decoration-line-through text-black-50"></span>
                                        </div>

                                        <div class="col-lg-4 mt-5  text-lg-start">
                                            <button class="btn btn-danger" onclick="removeWatchlist(<?php echo ($watch_data['id']); ?>);">Remove</button>&nbsp;<button class="fs-5 btn" style="background-color:#00e600;width:140px;height:40px;" onclick="addToCartFromWatchList(<?php echo $watch_data['id']; ?>)"><i class="bi bi-cart-plus-fill"></i></button>
                                        </div>
                                        <div class="col-10">
                                            <hr>
                                        </div>

                                    </div>
                                </div>

                            <?php
                            }

                            ?>

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



        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="script/script.js"></script>
</body>

</html>