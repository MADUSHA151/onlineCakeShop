<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akshi Cake</title>
    <link rel="stylesheet" href="style/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" integrity="sha256-5uKiXEwbaQh9cgd2/5Vp6WmMnsUr3VZZw0a8rKnOKNU=" crossorigin="anonymous">
</head>

<body>
    <!-- hero section -->
    <section class="hero-section">
        <div class="container">
            <!-- header -->
            <?php
            include("header.php");
            ?>
            <!-- header -->
            <div class="col-12">
                <div class="row m-0 py-lg-3 py-0 col">
                    <!-- text content -->
                    <div class="hero-content mt-lg-5 col-12 col-lg-6 p-lg-3 p-0 order-lg-1 order-2 image-section">
                        <div class="row m-0">
                            <div class="col-12 text-center text-lg-start">
                                <div class="row m-0">
                                    <div class=" order-4 order-lg-4 col-lg-4 d-flex justify-content-start justify-content-lg-between align-items-center">
                                        <div class="rounded-5 bg-white p-1 d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;"><i class="bi bi-play-fill text-danger fs-2"></i></div>
                                        <span class="fs-5 ms-3 fw-bold">Watch Video</span>
                                    </div>
                                    <div class="order-2 col-12 my-lg-2 my-0">
                                        <span class="fs-1 fw-bold">Perfectly Backed Cake Everyday..!</span>
                                    </div>
                                    <div class="order-3 col-12 my-2 ">

                                        <?php
                                        for ($x = 0; $x < 5; $x++) {
                                            if ($x == 0) {
                                        ?>
                                                <div class="row m-0">
                                                    <span class="hero-paragraph-appear hero-paragraph" id="herpParagraph<?php echo ($x); ?>"><?php echo ($x); ?> This is a random paragraph that has been created by the user him self. You can automate auto change of this content</span>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="row m-0">
                                                    <span style="display: none;" class="hero-paragraph-appear hero-paragraph" id="herpParagraph<?php echo ($x); ?>"><?php echo ($x); ?> This is a random paragraph that has been created by the user him self. You can automate auto change of this content</span>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="order-1 order-md-4 col-12 my-lg-2 my-0">
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center justify-content-lg-start">
                                                <div class="px-2">
                                                    <button class="c-btn c-btn-1 p-2">Read More</button>
                                                </div>
                                                <div class="px-2">
                                                    <button class="c-btn c-btn-2 p-2">Order Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- image section -->
                    <div class="col-12 col-lg-6 mt-lg-5 p-3 order-lg-2 order-1 image-section">
                        <div class="row">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                                <div class="carousel-indicators  d-none d-lg-block" style="left: 30%; top: 100%;">
                                    <button style="border-radius: 20px; border: orangered 2px solid; width: 15px; height: 15px;" class=" active" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1"></button>
                                    <button style="border-radius: 20px; border: orangered 2px solid; width: 15px; height: 15px;" class="" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button style="border-radius: 20px; border: orangered 2px solid; width: 15px; height: 15px;" class=" " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner bg-transparent">
                                    <div class="carousel-item active">
                                        <div style="background-image: url(image/cake-9747.png)" class="hero-bg-img d-block w-100"></div>
                                    </div>
                                    <div class="carousel-item">
                                        <div style="background-image: url(image/cake-9754.png)" class="hero-bg-img d-block w-100"></div>
                                    </div>
                                    <div class="carousel-item">
                                        <div style="background-image: url(image/cookies.png)" class="hero-bg-img d-block w-100"></div>
                                    </div>
                                </div>
                                <button class="d-block d-lg-none carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="d-block d-lg-none carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- hero section -->

    <!-- welcome section -->
    <div style="background-color:  #e2fafa; min-height: 678px;">
        <div class="container py-5" id="services">

            <h1 style="font-weight: 700;" class="text-center">Wellcome To Our Store</h1></br>
            <p class="text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. industry's </br> standard dummy text ever since the 1500s</p></br></br>

            <div class="container-fluid">

                <div class="row">

                    <div class="box text-center col-lg-4 ms-lg-0 ">
                        <a href="categoryView.php" class="text-decoration-none text-dark"><img src="image/cake.png" alt="">
                            <h3 class="text-center">Cake</h3>
                        </a>
                    </div>

                    <div class="box text-center col-lg-4 ms-lg-0 ">
                        <img src="image/cookies.png" alt="">
                        <h3 class="text-center">Cookies</h3>
                    </div>

                    <div class="box text-center col-lg-4 ms-lg-0 ">
                        <img src="image/items.png" alt="">
                        <h3 class="text-center">Items</h3>
                    </div>



                </div>

                <div class="row ">

                    <div class="col-6" style="margin-top:70px ;">
                        <img style="opacity: 0.35;" class="col-10" src="image/image.png">
                    </div>

                    <div class="col-6 " style="margin-top:70px ;"></br></br></br>
                        <h1 style="font-weight: 700;">About <span class="akshi-font">Akshi</span> Cake</h1>
                        <p>lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indusry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ype specimen book. It has survived not only five centuries.</p>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <!-- welcome section -->



    <!-- reveiew section -->
    <div class="section-2 container-main1 ">
        <div class="container ">
            <div class="row">
                <div class="col-12 text-center p-2 mt-5 mt-lg-0">
                    <span class="fw-bold fs-2">Customer Review</span>
                </div>
                <!-- card -->
                <!-- stating point -->
                <div class="card border border-danger mb-4  border-4 border-opacity-50 splide__list" style=" border-radius:14px;">
                    <div id="customerFeedbackCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            <?php
                            $feedbacksTable = Database::search("SELECT * FROM `feedbacks` WHERE `status_id` = '1'");

                            for ($i = 0; $i < $feedbacksTable->num_rows; $i++) {
                                $feedbacksData = $feedbacksTable->fetch_assoc();

                                $userTable = Database::search("SELECT * FROM `user` WHERE `id`='" . $feedbacksData["user_id"] . "'");
                                for ($x = 0; $x < $userTable->num_rows; $x++) {
                                    $userData = $userTable->fetch_assoc();
                                }


                                $invoiceTable = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $feedbacksData["order_id"] . "'");
                                for ($z = 1; $z < $invoiceTable->num_rows; $z++) {
                                    $invoiceData = $invoiceTable->fetch_assoc();




                                    $imageTable = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $invoiceData["product_id"] . "'");
                                    for ($r = 0; $r < $imageTable->num_rows; $r++) {
                                        $imageData = $imageTable->fetch_assoc();


                            ?>
                                        <!-- Customer Feedback Item 1 -->
                                        <div class="carousel-item active">
                                            <img src="<?php echo $imageData["coad"] ?>'" class="d-block mx-auto" alt="Product Image" style="width: 300px; height: 300px;" />
                                            <div class="carousel-caption">
                                                <h5><?php echo $userData["user"] ?></h5>
                                                <p class="fs-3 fw-bold bg-success">"<?php echo $feedbacksData["feedback"]; ?>"</p>
                                            </div>
                                        </div>

                            <?php



                                    }
                                }
                            }

                            ?>

                            <!-- Add more customer feedback items as needed -->

                        </div>

                        <!-- Add carousel controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#customerFeedbackCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#customerFeedbackCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- card -->
        </div>
    </div>
    </div>
    <!-- reveiew section -->


    <?php
    include("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="script/script.js"></script>
</body>

</html>