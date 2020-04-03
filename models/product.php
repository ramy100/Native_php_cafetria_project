<?php
class Product
{

    public static function insert($product_name, $price, $category)
    {
        $allowed_image_extension = ["png", "jpg", "jpeg", ""];
        $path_parts = pathinfo("{$_FILES["image"]["name"]}");
        require 'database.php';
        if (!in_array($path_parts['extension'], $allowed_image_extension)) {
            $sql = "INSERT INTO products (product_name, price,category_id,product_image) VALUES ('{$product_name}',{$price},'{$category}','no_img.png')";
            $mysqli->query($sql);
            return;
        }
        $upfile = '../files/images/' . $_FILES["image"]["name"];
        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $upfile)) {
                echo 'Problem: Could not move file to destination directory';
                exit;
            }
            $image = $_FILES["image"]["name"];
            $sql = "INSERT INTO products (product_name, price,category_id,product_image) VALUES ('{$product_name}',{$price},'{$category}','{$image}')";
            $mysqli->query($sql);
        } else {
            $sql = "INSERT INTO products (product_name, price,category_id,product_image) VALUES ('{$product_name}',{$price},'{$category}','no_img.png')";
            $mysqli->query($sql);
        }
    }
    public static function get_products()
    {
        require 'database.php';
        $sql = "SELECT p.product_name,p.price,pc.category_name,p.product_image FROM `products` as p , product_category as pc where p.category_id=pc.id";
        return $mysqli->query($sql);
    }
}
