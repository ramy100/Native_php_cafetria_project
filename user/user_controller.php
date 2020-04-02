<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location:../login.php");
    exit();
}
if ($_SESSION['role'] != "user") {
    header("Location:../login.php");
    exit();
}
if (isset($_POST['make_order'])) {
    require '../models/orders.php';
    Order::insert($_POST);
    header("Location:user_orders.php");
    exit();
}
