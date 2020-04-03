<?php
class Category
{
    public static function insert($post)
    {
        require 'database.php';
        $sql = "INSERT INTO product_category(category_name) VALUES ('{$post}')";
        $mysqli->query($sql);
    }
}
