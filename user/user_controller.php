<?php
require '../models/orders.php';
Order::insert($_POST);
// header("Location:user_profile.php");
exit();
