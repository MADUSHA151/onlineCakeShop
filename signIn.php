<?php
require "app/connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/signIn.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,600,0,0" />
    <title>SignIn Page</title>
</head>

<body>

    <div class="container">
        <div class="login-left">
            <div class="login-header">
                <h1>Welcome to Our Shop</h1>
                <p>Please login to use the platform</p>
            </div>

            <?php
            $email = "";
            $password = "";

            if (isset($_COOKIE["email2"])) {
                $email = $_COOKIE["email2"];
            }
            if (isset($_COOKIE["password2"])) {
                $password  = $_COOKIE["password2"];
            }

            // setcookie("email2", $email, time() + (60 * 60 * 24 * 365));
            // setcookie("password2", $password, time() + (60 * 60 * 24 * 365));




            ?>
            <div class="login-form" autocomplete="off">
                <div class="login-form-content">
                    <div class="form-item">
                        <label for="emailForm">Enter Email</label>
                        <input type="email" id="emailForm" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-item">
                        <label for="passwordForm">Enter Password</label>
                        <input type="password" id="passwordForm" value="<?php echo $password; ?>">

                    </div>
                    <a href="forgotPassword.php" class="fg">Fogoton Password?</a>
                    <div class="form-item">
                        <div class="checkbox">
                            <input type="checkbox" id="rememberMeCheckbox">
                            <label class="checkboxLabel" for="rememberMeCheckbox">Remember me</label>
                        </div>
                    </div>
                    <button onclick="signIn();">Sign In</button>
                    <a href="signUp.php" class="na">Create New Account?</a>
                </div>
                <div class="login-form-footer">
                    <a href="#">
                        <img width="30" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/1365px-Facebook_f_logo_%282019%29.svg.png">
                        Facebook Login
                    </a>
                    <a href="#">
                        <img width="30" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSK5q0FP74VV9wbfwP378_7kj7iDomHuKrxkXsxDdUT28V9dlVMNUe-EMzaLwaFhneeuZI&usqp=CAU">
                        Google Login
                    </a>

                </div>
            </div>
        </div>
        <div class="login-right">
            <img src="image/signIn_icone/cake.svg" alt="image">
        </div>
    </div>


    <script src="script/script.js"></script>
</body>

</html>