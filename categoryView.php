<!-- <?php
// session_start();
?> -->
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category View | Online Cake Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/main.css">
</head>

<body style="background-image:linear-gradient(180deg, #6CF4FD 0%, #E1B1B1 100vh);min-height:100vh;overflow-x: hidden;">
    <div class="container-fluid w-100 ">
        <div class="row">
            <!-- header -->
            <?php
            include("header.php");
            ?>
            <!-- header -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 mt-5 p-0 d-flex justify-content-center">
                                <h1 class="fw-bold">Category</h1>
                            </div>
                            <div class="col-12 p-0 d-flex justify-content-center ">
                                <label class="fw-bold">Select Your cake Category</label>
                            </div>

                            <!-- sendProductIdProcess.php?id=" + id, -->
                            <?php
                            // require "app\connection.php";
                            $category_rs = Database::search("SELECT * FROM `category`");
                            $category_num = $category_rs->num_rows;

                            for ($x = 0; $x < $category_num; $x++) {
                                $category_data = $category_rs->fetch_assoc();

                                // $_SESSION["p"] = $category_data;

                            ?>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-lg-4 mt-5 mb-3 offset-lg-1 col-7  ">
                                            <div class="row">
                                                <div class="col-12 border border-1 rounded-5 shadow " style="background-color:#E26868;">
                                                    <a href='<?php echo "singleCategoryView.php?id=" . $category_data["id"]; ?>'><img src="image/categoryImg/ring.svg" alt=""></a>
                                                </div>
                                                <span class="text-center fw-bold fs-4"><?php echo $category_data["name"] ?></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }

                            ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="script/script.js"></script>

</body>

</html>