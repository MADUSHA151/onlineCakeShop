<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style/signUpStyle.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

</head>

<body>

    <?php

    require "app/connection.php";

    ?>

    <div class="main-container">
        <div class="hero">
            <div class="user-icon">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24">
                        <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm0 22c-3.123 0-5.914-1.441-7.749-3.69.259-.588.783-.995 1.867-1.246 2.244-.518 4.459-.981 3.393-2.945-3.155-5.82-.899-9.119 2.489-9.119 3.322 0 5.634 3.177 2.489 9.119-1.035 1.952 1.1 2.416 3.393 2.945 1.082.25 1.61.655 1.871 1.241-1.836 2.253-4.628 3.695-7.753 3.695z" />
                    </svg>
                </a>
            </div>
            <div class="form-area">
                <div class="form1">
                    <label class="lbl-for-mobile" for="username">User name</label>
                    <input type="text" placeholder="enter user name" id="userName" />
                </div>

                <div class="form1">
                    <label class="lbl-for-mobile" for="email">Your Email</label>
                    <input type="text" placeholder="enter email" id="email" />
                </div>

                <div class="form1">
                    <label class="lbl-for-mobile" for="mobile">Mobile No</label>
                    <input type="text" placeholder="enter mobile number" id="mobile" />
                </div>

                <div class="form1">
                    <label class="lbl-for-mobile" for="password">Password</label>
                    <input type="password" placeholder="enter password" id="password" />
                </div>

                <div class="form1">
                    <label class="gen-for-mobile lbl-for-mobile" for="gender">Select gender</label>
                    <select class="se-for-mobile" name="gender" id="gender" required>

                        <?php


                        $resultset = Database::search("SELECT * FROM `gender`");
                        $n = $resultset->num_rows;

                        for ($x = 0; $x < $n; $x++) {
                            $f = $resultset->fetch_assoc();

                        ?>

                            <option value="<?php echo $f["id"]; ?>"><?php echo $f["gender"]; ?></option>

                        <?php

                        }

                        ?>

                    </select>
                </div>

                <div class="form1">
                    <label class="lbl-for-mobile" for="city">Select city</label>
                    <select class="se-for-mobile" name="city" id="city" required>

                        <?php


                        $resultset = Database::search("SELECT * FROM `city`");
                        $num = $resultset->num_rows;

                        for ($x = 0; $x < $num; $x++) {
                            $res = $resultset->fetch_assoc();

                        ?>

                            <option value="<?php echo $res["id"]; ?>"><?php echo $res["name"]; ?></option>

                        <?php
                        }
                        ?>

                    </select>
                </div>
            </div>

            <div class="button-area">
                <button class="button1" onclick="signUp();">Sign Up</button>
            </div>

            <div>

            </div>
        </div>
    </div>
    <script src="script/script.js"></script>
</body>

</html>