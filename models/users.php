<?php
class user
{
    public static function create_user($user_name, $email, $password, $room_number, $ext)
    {
        $allowed_image_extension = ["png", "jpg", "jpeg", ""];
        $path_parts = pathinfo("{$_FILES["image"]["name"]}");
        require 'database.php';
        if (isset($path_parts['extension'])) {
            if (!in_array($path_parts['extension'], $allowed_image_extension)) {
                $sql = "INSERT INTO users(user_name,`image`,email,`password`,room_number,ext) VALUES ('{$user_name}','no_img.png','{$email}','{$password}','{$room_number}','{$ext}')";
                $mysqli->query($sql);
                return;
            }
        }
        $upfile = '../files/images/' . $_FILES["image"]["name"];
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $upfile)) {
                echo 'Problem: Could not move file to destination directory';
                exit;
            }
            $image = $_FILES["image"]["name"];
            $sql = "INSERT INTO users(user_name,`image`,email,`password`,room_number,ext) VALUES ('{$user_name}','{$image}','{$email}','{$password}','{$room_number}','{$ext}')";
            $mysqli->query($sql);
        } else {
            $sql = "INSERT INTO users(user_name,`image`,email,`password`,room_number,ext) VALUES ('{$user_name}','no_img.png','{$email}','{$password}','{$room_number}','{$ext}')";
            $mysqli->query($sql);
        }
    }
    public static function get_users()
    {
        require 'database.php';
        $sql = "SELECT * FROM `users`";
        return $mysqli->query($sql);
    }
}
