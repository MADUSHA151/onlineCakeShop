<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akshi Cake</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/singleProductStyles.css" />
    <link rel="stylesheet" href="style/main.css">
</head>

<body>
    <div class="container-fluid overflow-hidden ">
        <div class="col-12 ">
            <div class="row">
                <?php require "app\connection.php";
                $product_id = $_GET["id"];
                // $category = $_GET["id"];
                $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $product_id . "' ");
                $product_num = $product_rs->num_rows;
                $product_data = $product_rs->fetch_assoc();

                $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $product_data["id"] . "'");

                ?>

                <div class="col-lg-5 col-12  box1">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center align-items-center box1">
                            <!-- <img class="b1" src="src\images\slider\cake1.png" alt=""> -->
                            <div id="carouselExampleIndicators" class="carousel slide b1 " data-bs-ride="true">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                </div>
                                <div class="carousel-inner bg-transparent d-flex align-items-center">

                                    <?php
                                    for ($u = 0; $u < $image_rs->num_rows; $u++) {
                                        $image_data = $image_rs->fetch_assoc();
                                    ?>
                                        <div class="carousel-item active">
                                            <img src="<?php echo $image_data["coad"] ?>" class="d-block w-100" alt="...">
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-12 box2 p-2">
                    <div class="row p-lg-5 p">
                        <div class="col-12 m-4">
                            <div class="row">
                                <div class="d-flex ">
                                    <i class="bi mx-1 bi-star-fill text-warning"></i>
                                    <i class="bi mx-1 bi-star-fill text-warning"></i>
                                    <i class="bi mx-1 bi-star-fill text-warning"></i>
                                    <i class="bi mx-1 bi-star-fill text-warning"></i>
                                    <i class="bi mx-1 bi-star"></i>
                                </div>
                                <?php
                                $c_rs = Database::search("SELECT * FROM `category` WHERE `id`='" . $product_data["category_id"] . "'");
                                $c_data = $c_rs->fetch_assoc();
                                ?>
                                <h1 class=" fw-bold fs-1"><?php echo $product_data["title"]; ?></h1>
                                <h2 class=" fs-5" style="margin-top:-10px ;"><?php echo $c_data["name"];  ?></h2>

                                <h3 class="fw-bold mt-4 fs-2">Rs.<?php echo $product_data["price"] ?>.00</h3>
                                <div class="col-12 d-flex " style="font-size: 15px;">

                                    <span class="ms-2"><?php if ($product_data["qty"] > 0) {
                                                        ?><i class="bi bi-check-circle-fill text-success"></i>&nbsp;In stock
                                        <?php
                                                        } else {
                                        ?>
                                            <span class="text-danger">Out of stock</span>
                                        <?php
                                                        } ?></span>
                                </div>


                                <p class="fs-5 ms-1 mt-4 "><?php echo $product_data["discription"]; ?></p>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-2 col-4  col-md-3">
                                            <h2 class="fs-4 fw-bold">weight</h2>
                                            <?php
                                            $rs = Database::search("SELECT `weight_id` FROM `product_has_weight` WHERE `product_id`= '" . $product_id . "'");

                                            $num = $rs->num_rows;
                                            ?>
                                        </div>
                                        <div class="col-5 col-lg-3 col-md-2 ">
                                            <select name="" id="weightID" class="form-select bg-info fw-bold">
                                                <?php
                                                for ($x = 0; $x < $num; $x++) {
                                                    $data = $rs->fetch_assoc();
                                                    $rss = Database::search("SELECT * FROM `weight` WHERE `id`='" . $data["weight_id"] . "'");
                                                    $datas = $rss->fetch_assoc();
                                                ?>

                                                    <option value="<?php echo $datas["id"] ?>"><?php echo $datas["name"]; ?></option>

                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-12 mt-4 mb-4">
                                    <div class="row gap-5">
                                        <div class="col-lg-2 col-3 col-md-2">
                                            <h2 class="fs-4 fw-bold">Quantity</h2>
                                        </div>

                                        <div class="col-4 col-lg-2 col-md-2 bg-info border border-1 border-secondary rounded overflow-hidden float-left  position-relative product-qty">
                                            <!-- <span>Quantity : </span> -->
                                            <input type="text" class="border-0 bg-info fs-5 fw-bold text-start" style="outline: none;" pattern="[0-9]" value="1" id="qty_input" onkeyup='checkValueSingle(<?php echo $product_data["qty"]; ?>);' />
                                            <div class="position-absolute qty-buttons">
                                                <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-secondary qty-inc">

                                                    <i class="bi bi-caret-up-fill text-primary fs-5" onclick='qty_incSingle(<?php echo $product_data["qty"]; ?>);'></i>
                                                </div>
                                                <div class="justify-content-center d-flex flex-column align-items-center border border-1 border-secondary qty-dec">

                                                    <i class="bi bi-caret-down-fill text-primary fs-5" onclick="qty_decSingle();"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 m-0">
                                    <div class="row p-0">
                                        <div class="col-lg-2 col-5 col-md-3">
                                            <button class=" btn btn-info mt-5 px-2 py-1 rounded-3 fw-bold" onclick="addToCart(<?php echo $product_data['id']; ?>);">Add To Cart</button>
                                        </div>
                                        <div class="col-lg-3 col-7 col-md-3">
                                            <button class="btn btn-danger mt-5 px-2 py-1 rounded-3 fw-bold" onclick="addToWatchlist(<?php echo $product_data['id']; ?>);">Add To Watchlist</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="script/script.js"></script>
</body>

</html>