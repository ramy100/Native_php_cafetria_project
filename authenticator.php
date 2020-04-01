<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "my_cafeteria");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
if (isset($_POST['login'])) {
    if ($_POST["UserName"] == "admin" && $_POST["Password"] == "123") {
        $_SESSION['role'] = "admin";
        $_SESSION['UserName'] = "Admin";
        header("Location:admin/admin_profile.php");
    } else {
        $sql = "SELECT * FROM users WHERE user_name='{$_POST["UserName"]}' and password='{$_POST["Password"]}'";
        $result = $mysqli->query($sql);
        $row = $result->fetch_assoc();
        var_dump($row);
        if ($row) {
            $_SESSION['UserName'] = $row["user_name"];
            $_SESSION['id'] = $row["id"];
            $_SESSION['role'] = "user";
            header("Location:user/user_profile.php");
        } else {
            header("Location:login.php");
        }
        $result->free_result();
    }
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location:Login.php");
}
