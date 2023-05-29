<?php
session_start();

if (isset($_SESSION)) {
    $_SESSION["au_a"] = "";
    session_destroy();
};
