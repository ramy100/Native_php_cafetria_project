<?php
require('../models/product.php');
require('../models/users.php');
require('../models/category.php');
session_start();
if (!isset($_SESSION['role'])) {
    header("Location:../login.php");
    exit();
}



if (isset($_POST["add_product"])) {
    $errors = [];
    $allowed_image_extension = ["png", "jpg", "jpeg", ""];
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
    if (isset($path_parts['extension'])) {
        if (!in_array($path_parts['extension'], $allowed_image_extension)) {
            array_push($errors, "image");
        }
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


if (isset($_POST["add_user"])) {
    $errors = [];
    $allowed_image_extension = ["png", "jpg", "jpeg", ""];
}



if (isset($_POST["add_user"])) {
    $errors = [];
    $allowed_image_extension = ["png", "jpg", "jpeg", ""];
    $path_parts = pathinfo("{$_FILES["image"]["name"]}");
    foreach ($_POST as $key => $val) {
        if (empty($val) && $key != "add_user") {
            array_push($errors, $key);
        }
    }
    if (isset($path_parts['extension'])) {
        if (!in_array($path_parts['extension'], $allowed_image_extension)) {
            array_push($errors, "image");
        }
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $_POST["user_name"])) {
        array_push($errors, "user_name");
    }
    if (!preg_match("/[0-9]{1,}/", $_POST["room_number"])) {
        array_push($errors, "room_number");
    }

    if (!preg_match("/[0-9]{1,}/", $_POST["ext"])) {
        array_push($errors, "ext");
    }

    if (!preg_match("/.{6,}/", $_POST["password"])) {
        array_push($errors, "password");
    }
    if (!empty($errors)) {
        header("Location:add_user.php?errors=" . implode(";", $errors));
        exit();
    }
    user::create_user($_POST["user_name"], $_POST["email"], $_POST["password"], $_POST["room_number"], $_POST["ext"]);
    header("Location:all_users.php");
    exit();
}

if (isset($_POST["add_category"])) {
    $errors = [];
    if (!preg_match("/^[a-zA-Z ]*$/", $_POST["category_name"]) || $_POST["category_name"] == "") {
        array_push($errors, "category_name");
    }
    if (!empty($errors)) {
        header("Location:add_category.php?errors=" . implode(";", $errors));
        exit();
    }
    Category::insert($_POST["category_name"]);
    echo ($_POST["category_name"]);
    header("Location:all_products.php");
    exit();
}
