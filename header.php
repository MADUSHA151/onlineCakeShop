<!-- sign in identification -->
<?php
require "app/connection.php";
session_start();
$signedOut = false;
$signedInUser;
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online CakeShop | Header</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Knewave&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="col-12 ">
        <div class="row">
            <div class="col-3 d-lg-none d-block mobile-toggler">
                <a href="" data-bs-toggle="modal" data-bs-target="#navbModal" class="">
                    <i class="bi bi-justify fs-1 text-decoration-none text-dark"></i>
                </a>
            </div>
            <div class="col-lg-3 col-9 fs-2 d-flex justify-content-end justify-content-lg-start ">
                <span class="akshi-font offset-3 offset-lg-0 "><a href="index.php" class="text-decoration-none text-black akshi-font">Akshi</a></span> &nbsp;<a href="index.php" class="text-decoration-none text-black">Cake</a>
            </div>
            <div class="col-12 col-lg-9 d-none d-lg-block ">
                <div class="row d-flex justify-content-end">
                    <div class="col-1  headerFont mt-2">
                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Home" title="Home"><a href="index.php" class="text-decoration-none text-black"><i class="bi bi-house-heart-fill fs-3"></i></a></span>
                    </div>

                    <div class="col-1 mt-2 headerFont ">
                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Home" title="Menu"><a href="categoryView.php" class="text-decoration-none text-black"><i class="bi bi-menu-button-wide-fill fs-3"></i></a></span>
                    </div>

                    <div class="col-1 mt-2 headerFont">
                        <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Home" title="Contact Us "> <i class="bi bi-file-earmark-person-fill fs-3"></i></span>
                    </div>

                    <div class="col-1 mt-2 headerFont">
                        <a href="cart.php" class="text-decoration-none text-black" class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Home" title="Cart"><i class="bi bi-cart-check-fill fs-3"></i></a>
                    </div>

                    <div class="col-1 mt-2 headerFont">
                        <a href="wishlist.php" class="text-decoration-none text-black" class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Home" title="Watchlist"><i class="bi bi-calendar2-heart-fill fs-3"></i></a>
                    </div>
                    <div class="col-1 mt-2 headerFont">
                       <a href="purchaseHistory.php" class="text-decoration-none text-black" class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Home" title="Purchase History"><i class="bi bi-card-list fs-3"></i></a>
                    </div>
                    <div class="headerFont col-3 mt-2">
                        <?php
                        if (isset($_SESSION["ac_u"])) { // session variable as created witha prefix named "ac_" due to the session issue of session variable sharing on all websites in localhost enironment
                            $signedInUser = $_SESSION["ac_u"];
                            ?>
                            <button class="btn btn-danger" type="button" class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Home" title="Log Out">Log Out</button>
                            <?php
                        } else {
                            $signedOut = true;
                            // echo ("Signed Out");
                        ?>
                            <a href="signIn.php" class="btn btn-danger">Join</a>

                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="navbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-image: linear-gradient(to right, #b3dfdf, #fffffe);">

                <div class="modal-header">
                    <span class="akshi-font offset-2 offset-lg-0 fs-3"><a href="index.php" class="text-decoration-none text-black akshi-font">Akshi</a></span> &nbsp;<a href="index.php" class="text-decoration-none text-black">Cake</a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-square"></i></button>
                </div>

                <div class="modal-body">

                    <div class="modal-line">
                        <i class="bi bi-house-heart-fill"></i><a href="index.php" class="text-decoration-none text-black">Home</a>
                    </div>

                    <div class="modal-line">
                        <i class="bi bi-menu-button-wide-fill"></i><a href="categoryView.php" class="text-decoration-none text-black">Menu</a>
                    </div>

                    <div class="modal-line">
                        <i class="bi bi-file-earmark-person-fill"></i><a href="/cases" class="text-decoration-none text-black">About</a>
                    </div>

                    <div class="modal-line">
                        <i class="bi bi-cart-check-fill"></i><a href="cart.php" class="text-decoration-none text-black">Cart</a>
                    </div>
                    <div class="modal-line">
                        <i class="bi bi-calendar2-heart-fill"></i><a href="wishlist.php" class="text-decoration-none text-black">Watchlist</a>
                    </div>
                    <div class="modal-line">
                        <i class="bi bi-card-list"></i><a href="wishlist.php" class="text-decoration-none text-black">Purchase History</a>
                    </div>
                    <div class="modal-line">
                        <?php
                        if (isset($_SESSION["ac_u"])) { // session variable as created witha prefix named "ac_" due to the session issue of session variable sharing on all websites in localhost enironment
                            $signedInUser = $_SESSION["ac_u"];
                            ?>
                            <button class="btn btn-danger">Log Out</button>
                            <?php
                        } else {
                            $signedOut = true;
                            // echo ("Signed Out");
                        ?>
                            <a href="signIn.php" class="btn btn-danger">Join</a>

                        <?php
                        }
                        ?>
                    </div>

                    <a href="/contact" class="navb-button" type="button">Contact Us</a>
                </div>

                <div class="mobile-modal-footer">

                    <a target="_blank" href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a target="_blank" href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a target="_blank" href="#"><i class="fa-brands fa-youtube"></i></a>
                    <a target="_blank" href="#"><i class="fa-brands fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>