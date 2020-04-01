<?php
require('../models/product.php');
if (isset($_POST["add_product"])) {
    $errors = [];
    $allowed_image_extension = ["png", "jpg", "jpeg", ""];
}
session_start();
if (!isset($_SESSION['role'])) {
    header("Location:../login.php");
    exit();
}
if (isset($_POST["add_product"])) {
    $errors = [];
    $allowed_image_extension = ["png", "jpg", "jpeg", ""];
    $path_parts = pathinfo("{$_FILES["image"]["name"]}");
    foreach ($_POST as $key => $val) {
        if (empty($val) && $key != "add_product") {
            array_push($errors, $key);
        }
    }
    if (!in_array($path_parts['extension'], $allowed_image_extension)) {
        array_push($errors, "image");
    }
    if (!preg_match("/^[a-zA-Z ]*$/", $_POST["product_name"])) {
        array_push($errors, "product_name");
    }
    if (!preg_match("/[0-9]/", $_POST["category"])) {
        array_push($errors, "category");
    }
    if (!empty($errors)) {
        header("Location:add_product.php?errors=" . implode(";", $errors));
        exit();
    }

    Product::insert($_POST["product_name"], $_POST["price"], $_POST["category"]);
    header("Location:admin_profile.php");
    exit();
}
