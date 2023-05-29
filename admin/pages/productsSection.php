<?php

$adminPanelLocation = '/onlineCakeShop/admin/index.php';

if ($adminPanelLocation == $_SERVER['PHP_SELF']) {
    require_once("adminProcess/adminUserAccessValidator.php"); // validate user access
    require_once("../app/connection.php");
} else {
    require_once("../adminProcess/adminUserAccessValidator.php"); // validate user access
    // require("../adminProcess/adminUserAccessValidator.php");

    require_once("../../app/connection.php");
    // require("../../app/connection.php");
}

$accessValidator = new AdminAccessValidator();
$accessValidator->hasAccess(); // check the access and redirect accordingly




?>

<div class="col-12 p-0">
    <div class="row m-0">
        <div class="col-12 p-0">
            <div class="row m-0">
                <span class="text-center fs-3 py-1 fw-bolder">Add Products</span>
            </div>
        </div>

        <div class="col-md-6 col-12 p-0">
            <div class="row m-0 p-2">
                <div class="col-12 p-0">
                    <label class="fw-bold fs-5">Title</label>
                    <input id="title" type="text" class="w-100 c-input" placeholder="Add the product title" />
                </div>
                <div class="col-12 p-0">
                    <label class="fw-bold fs-5">Description</label>
                    <textarea id="description" class="w-100 c-input" cols="30" rows="5" placeholder="Add the product description"></textarea>
                </div>
                <div class="col-12 p-0">
                    <div class="row m-0">
                        <div class="col-6 p-0 pe-2">
                            <label class="fw-bold fs-5">Category</label>
                            <select id="category" type="number" class="w-100 c-input" min="1">
                                <option value="0" disabled selected>Select a Category</option>
                                <?php
                                $category_rs = Database::search("SELECT * FROM `category`");
                                $category_num = $category_rs->num_rows;

                                for ($t = 0; $t < $category_num; $t++) {
                                    $category_data = $category_rs->fetch_assoc();
                                ?>
                                    <option value="<?php echo ($category_data["id"]); ?>"><?php echo ($category_data["name"]); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-6 p-0 ps-2">
                            <label class="fw-bold fs-5">Weight</label>
                            <div class="dropdown">
                                <button class="c-input w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Weights
                                </button>
                                <div class="dropdown-menu w-100 p-2" style="max-height: 400px; overflow: auto;" id="weightInputCheckBoxes">
                                    <?php
                                    $weight_rs = Database::search("SELECT * FROM `weight` ORDER BY `name` ASC ");
                                    $weight_num = $weight_rs->num_rows;

                                    for ($r = 0; $r < $weight_num; $r++) {
                                        $weight_data = $weight_rs->fetch_assoc();
                                    ?>
                                        <div class="col-12 p-0">
                                            <div class="row- m-0">
                                                <input id="weightCheckBox<?php echo ($r); ?>" type="checkbox" value="<?php echo ($weight_data["id"]); ?>" />
                                                <label><?php echo ($weight_data["name"]); ?></label>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="col-12 p-0">
                                        <div class="row m-0 d-flex">
                                            <div class="col-8">
                                                <input id="newWeight" placeholder="add a new weight" type="number" max="10" min="0" class="form-control">
                                            </div>
                                            <button class="btn btn-sm btn-primary col-4 " onclick="addWeight();">Add a Weight</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <div class="row m-0">
                        <div class="col-6 p-0 pe-2">
                            <label class="fw-bold fs-5">Quantity</label>
                            <input id="qty" type="number" class="w-100 c-input" value="1" min="1" />
                        </div>
                        <div class="col-6 p-0 ps-2">
                            <label class="fw-bold fs-5">Price <span class="fw-lighter">(Rs)</span></label>
                            <input id="price" type="text" class="w-100 c-input" placeholder=" Add product Price" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6 col-12 p-0">
            <div class="row m-0 p-2">
                <div class="col-12 p-0">
                    <label class="fw-bold fs-5">Select 4 Images of Product</label>
                    <input id="images" multiple="multiple" accept=".jpg, .png, .jpeg, .svg" type="file" class="w-100 c-input bg-dark text-white" placeholder="Add the product title" onchange="imageShower();" />
                </div>

                <!-- images -->
                <div class="col-12 p-0" style="height: 347.69px; border: black 2px solid; overflow: auto;">
                    <div class="row m-0 p-2 d-flex justify-content-center">
                        <div id="paImageHolder0" class="add-product-img add-product-img-1"></div> <!-- image viewer -->
                        <div id="paImageHolder1" class="add-product-img add-product-img-2"></div> <!-- image viewer -->
                        <div id="paImageHolder2" class="add-product-img add-product-img-3"></div> <!-- image viewer -->
                        <div id="paImageHolder3" class="add-product-img add-product-img-4"></div> <!-- image viewer -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 p-0">
            <button class="fw-bold fs-5 text-white bg-primary c-input w-100" onclick="addProduct();">
                <div id="addProductBtnLoad" class="d-none spinner-border text-white" role="status">
                </div>
                <span id="addProductBtnText" class="">Add Product</span>
            </button>
        </div>
    </div>
</div>