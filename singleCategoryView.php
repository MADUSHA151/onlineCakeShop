<?php
session_start();
require "app\connection.php";
$category = $_GET["id"];
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/main.css">

</head>

<body style="background: linear-gradient(0deg, #159797 -21.25%, #F5F5F5 92.68%);">
    <div class="container-fluid" style="overflow-x: hidden;">
        <div class="row m-0 d-flex justify-content-center">
            <div class="col-12 p-0">
                <div class="row m-0">
                    <div class="col-12 mx-4 mt-3">
                        <?php
                        $category_Table = Database::search("SELECT * FROM `category` WHERE `id`='" . $category . "'");
                        $category_rowsData = $category_Table->fetch_assoc();
                        ?>
                        <span class="fw-bold fs-3"><?php echo $category_rowsData["name"] ?></span><br />
                        <span>Category</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <?php
                    $product_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $category . "' ");
                    $product_num = $product_rs->num_rows;

                    for ($x = 0; $x < $product_num; $x++) {
                        $product_data = $product_rs->fetch_assoc();
                        $image_rs = Database::search("SELECT * FROM `image` WHERE `product_id`='" . $product_data["id"] . "'");
                        $image_data = $image_rs->fetch_assoc();
                    ?>
                        <div class="col-12 col-md-6 col-lg-3 mt-lg-5 d-flex justify-content-center justify-content-md-center ">
                            <div class="card mt-5  d-flex align-content-center border border-info border-3" style="width: 13rem; border-radius:20px; background-color:#62D3E2;" class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Home" title="<?php echo $product_data["discription"] ?>">
                                <a href='<?php echo "singleProduct.php?id=" . $product_data["id"]; ?>' class="text-decoration-none text-dark">
                                    <div style="background: linear-gradient(180deg, #FFA1A1 0%, rgba(255, 255, 255, 0) 100%); border-radius:20px;">
                                        <img src="<?php echo $image_data["coad"] ?>" class="card-img-top my-3 " alt="cake_image" style="height:120px; width:120px; margin-left:40px;">
                                    </div>
                                    <div class="card-body">
                                        <span class="fw-bold" style="font-size:15px;"><?php echo $product_data["title"] ?></span><br />
                                        <span class="fw-bold" style="font-size:12px;"><?php echo $product_data["price"] ?></span><br />
                        
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script/script.js"></script>
</body>

</html>